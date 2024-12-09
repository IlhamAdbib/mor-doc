<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class residenceController extends Controller
{
    public function residence(){
        return view('residence');
    }

    //enregistrer les informations de reclamation
    public function demandePost(Request $request){

        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'apogee' => 'required|digits:8',
            'cin' => 'required|regex:/^[A-Z]{1,2}\d{1,6}$/',
            'document' => 'required',
        ]);

        // Commune à tous les documents
        $communData = [
            'email' => $request->input('email'),
            'apogee' => $request->input('apogee'),
            'cin' => $request->input('cin'),
        ];

        switch($request->input('document')){

            case 'option1':
                $request->validate([
                    'niveau' => 'required|in:1ere annee,2eme annee,3eme annee,4eme annee,5eme annee',
                    'cne' => 'required|regex:/^[A-Za-z]\d{9}$/',
                    'date_naissance' => 'required|date_format:Y-m-d',
                ]);
                // Vérification si les données existent déjà dans la table demande_releve
                // $existingRecord = Atsscolarite::where([
                //     'email' => $request->email,
                //     'apogee' => $request->apogee,
                //     'cin' => $request->cin,
                //     'date_naissance' =>$request->date_naissance,
                //     'cne'=>$request->cne,
                //     'status' => 'en cours',
                // ])->first();
                $exists=Demande::where([
                    'Appogé'=>$request->apogee,
                    'Type'=>'Attestation de Scolarité',
                    'Email'=>$request->email,
                    'CIN'=>$request->cin,
                    'Etat'=>'n'
                ])->first();
                $existingStudent = Etudiant::where([
                    'email' => $request->email,
                    'Appogé' => $request->apogee,
                    'CIN' => $request->cin,
                    'Niveau' =>$request->niveau,
                ])->first();

                if ($exists) {
                     // Retournez avec un message d'erreur si les données existent déjà
                     return redirect()->back()->withErrors(['error' => 'Vous avez déjà demandé ce document!']);
                }

                else if(!$exists && !$existingStudent){
                    // Retournez avec un message d'erreur si les informations de cet étudiant n'existe pas
                    return redirect()->back()->withErrors(['error' => 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer!']);
                }
                else if(!$exists &&  $existingStudent){
                    // Retournez avec un message pour confirmer l'envoi des données dans la BD
                    // $prenom = DB::select('SELECT Prenom FROM etudiants WHERE Email = ? and  Appogé= ? and CIN=?', [$request->email, $request->apogee, $request->cin])[0];

                    // $nom= DB::select('SELECT Nom FROM etudiants WHERE Email = ? and  Appogé= ? and CIN=?', [$request->email, $request->apogee, $request->cin])[0];
                    // $cne= DB::select('SELECT CNE FROM etudiants WHERE Email = ? and  Appogé= ? and CIN=?', [$request->email, $request->apogee, $request->cin])[0];
                    $prenom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                        'Niveau' =>$request->niveau,
                    ])->value('Prenom');

                    $nom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                        'Niveau' =>$request->niveau,
                    ])->value('Nom');

                    $cne = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                        'Niveau' =>$request->niveau,
                    ])->value('CNE');

                    Demande::create([
                        'Appogé'=>$request->apogee,
                        'Prenom'=>$prenom,
                        'Nom'=>$nom,
                        'Type'=>'Attestation de Scolarité',
                        'Email'=>$request->email,
                        'CIN'=>$request->cin,
                        'CNE'=>$cne,
                        'Etat'=>'n'
                    ]);
                    // Retournez avec un message pour confirmer l'envoi des données dans la BD
                    return redirect()->back()->with('success', 'Votre demande a bien été envoyée!');
                }
                break;

            case 'option2':

                $request->validate([
                    'nomm' => 'required',
                ]);

                // Vérification si les données existent déjà dans la table demande_releve
                // $existingRecord = Atsreussite::where([
                //     'email' => $request->email,
                //     'apogee' => $request->apogee,
                //     'cin' => $request->cin,
                //     'nom' => $request->nomm,
                //     'status' => 'en cours',
                // ])->first();

                $exists=Demande::where([
                    'Appogé'=>$request->apogee,
                    'Type'=>'Attestation de Reussite',
                    'Email'=>$request->email,
                    'CIN'=>$request->cin,
                    'Etat'=>'n'
                ])->first();

                $existingStudent = Etudiant::where([
                    'email' => $request->email,
                    'Appogé' => $request->apogee,
                    'CIN' => $request->cin,
                ])->first();

                if ($exists) {
                    // Retournez avec un message d'erreur si les données existent déjà
                    return redirect()->back()->withErrors(['error' => 'Vous avez déjà demandé ce document!']);
                }

                else if(!$exists && !$existingStudent){
                    // Retournez avec un message d'erreur si les informations de cet étudiant n'existe pas
                    return redirect()->back()->withErrors(['error' => 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer!']);
                }

                else if(!$exists && $existingStudent){
                    // Retournez avec un message pour confirmer l'envoi des données dans la BD
                    $prenom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('Prenom');

                    $nom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('Nom');

                    $cne = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('CNE');

                    Demande::create([
                        'Appogé'=>$request->apogee,
                        'Prenom'=>$prenom,
                        'Nom'=>$nom,
                        'Type'=>'Attestation de Reussite',
                        'Email'=>$request->email,
                        'CIN'=>$request->cin,
                        'CNE'=>$cne,
                        'Etat'=>'n'
                    ]);

                    // Retournez avec un message pour confirmer l'envoi des données dans la BD
                    return redirect()->back()->with('success', 'Votre demande a bien été envoyée!');
                }
                break;

            case 'option3':
                $request->validate([
                    'nom' => 'required|string',
                    'annee_etude' => 'required|regex:/^\d{4}$/',
                    'filiere' => 'required|in:GI,SCM,GC,GSTR,GM,BDIA',
                    'date_debut' => 'required|date_format:Y-m-d',
                    'date_fin' => 'required|date_format:Y-m-d',
                    'sujet_stage' => 'required|string',
                    'nom_societe' => 'required|string',
                    'adr_societe' => 'required|string',
                    'tel_societe' => 'required|string',
                    'email_societe' => 'required|email',
                    'nom_rep_societe' => 'required|string',
                    'qualite_rep_societe' => 'required|string',
                    'encadrant_societe' => 'required|string',
                    'encadrant_pedagogique' => 'required|string',
                ]);
                /* Vérification si les données existent déjà dans la table demande_releve
                $existingRecord = Atsconvention::where([
                    'email' => $request->email,
                    'apogee' => $request->apogee,
                    'cin' => $request->cin,
                    'nom' => $request->nomm,
                    'status' => 'en cours',
                ])->first();*/

                $existingStudent = Etudiant::where([
                    'email' => $request->email,
                    'Appogé' => $request->apogee,
                    'CIN' => $request->cin,
                    //'fullname' => $request->nomm,
                ])->first();

               /* if ($existingRecord) {
                    // Retournez avec un message d'erreur si les données existent déjà
                    return redirect()->back()->withErrors(['error' => 'Vous avez déjà demandé ce document!']);
                }*/

                 if(!$existingStudent){
                    // Retournez avec un message d'erreur si les informations de cet étudiant n'existe pas
                    return redirect()->back()->withErrors(['error' => 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer!']);
                }

                else if($existingStudent){
                    // Retournez avec un message pour confirmer l'envoi des données dans la BD

                    $prenom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('Prenom');

                    $nom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('Nom');

                    $cne = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('CNE');

                    Demande::create([
                        'Appogé'=>$request->apogee,
                        'Prenom'=>$prenom,
                        'Nom'=>$nom,
                        'Type'=>'Convention de Stage',
                        'Email'=>$request->email,
                        'CIN'=>$request->cin,
                        'CNE'=>$cne,
                        'nomEntreprise'=>$request->nom_societe,
                        'representant'=>$request->nom_rep_societe,
                        'adressMail'=>$request->email_societe,
                        'tele'=>$request->tel_societe,
                        'adresseReel'=>$request->adr_societe,
                        'periode'=>  'du' . $request->date_debut . 'au' . $request->date_fin,
                        'encadrantEntreprise'=>$request->encadrant_societe,
                        'encadrantEcole'=>$request->encadrant_pedagogique,
                        'themeDeStage'=>$request->sujet_stage,
                        'Etat'=>'n'
                    ]);

                    // Retournez avec un message pour confirmer l'envoi des données dans la BD
                    return redirect()->back()->with('success', 'Votre demande a bien été envoyée!');
                }
                break;

            case 'option4':

                $request->validate([
                    'year' => 'required|in:2023-2024,2022-2023,2021-2022,2020-2021,2019-2020,2018-2019,2017-2018,2016-2017,2015-2016,2014-2015,2013-2014,2012-2013',
                ]);

                // Vérification si les données existent déjà dans la table demande_releve

                $exists=Demande::where([
                    'Appogé'=>$request->apogee,
                    'Type'=>'Relevé de Notes',
                    'Email'=>$request->email,
                    'CIN'=>$request->cin,
                    'Etat'=>'n'
                ])->first();

                $existingStudent = Etudiant::where([
                    'email' => $request->email,
                    'Appogé' => $request->apogee,
                    'CIN' => $request->cin
                ])->first();

                if ($exists) {
                    // Retournez avec un message d'erreur si les données existent déjà
                    return redirect()->back()->withErrors(['error' => 'Vous avez déjà demandé ce document!']);
                }

                else if(!$exists && !$existingStudent){
                    // Retournez avec un message d'erreur si les informations de cet étudiant n'existe pas
                    return redirect()->back()->withErrors(['error' => 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer!']);
                }

                else if(!$exists && $existingStudent){
                    // Retournez avec un message pour confirmer l'envoi des données dans la BD

                    $prenom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('Prenom');

                    $nom = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('Nom');

                    $cne = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('CNE');

                    $semestre = Etudiant::where([
                        'email' => $request->email,
                        'Appogé' => $request->apogee,
                        'CIN' => $request->cin,
                    ])->value('semestreAct');

                    Demande::create([
                        'Appogé'=>$request->apogee,
                        'Prenom'=>$prenom,
                        'Nom'=>$nom,
                        'Type'=>'Relevé de Notes',
                        'Semestre'=>$semestre,
                        'Email'=>$request->email,
                        'CIN'=>$request->cin,
                        'CNE'=>$cne,
                        'Etat'=>'n'
                    ]);

                    // Retournez avec un message pour confirmer l'envoi des données dans la BD
                    return redirect()->back()->with('success', 'Votre demande a bien été envoyée!');
                }

                break;

        }
    }
}
