<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Reclamations;
use Illuminate\Http\Request;

class ReclamerController extends Controller
{
    //
    public function reclamer()
    {
        return view('reclamer');
    }
    

    // Enregistrer les informations de reclamation
    public function reclamerPost(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'apogee' => 'required|numeric',
            'description' => 'required',
        ]);

        // Vérification de l'existence de l'étudiant par email
        $etudiantParEmail = DB::table('etudiants')
            ->where('email', $request->email)
            ->where('Appogé', $request->apogee)
            ->first();

        // Vérification de l'existence de l'étudiant par apogée
        $etudiantParApogee = DB::table('etudiants')
            ->where('email', $request->email)
            ->where('Appogé', $request->apogee)
            ->first();

            // Vérification de l'existence de l'étudiant par cin
            $etudiantParCin = DB::table('etudiants')
                ->where('email', $request->email)
                ->where('Appogé', $request->apogee)
                ->first();

                // Vérification de l'existence de l'étudiant par nom
                $etudiantParNom = DB::table('etudiants')
                    ->where('email', $request->email)
                    ->where('Appogé', $request->apogee)
                    ->first();

        if ($etudiantParEmail && $etudiantParApogee) {
            // Les deux vérifications sont correctes, enregistrez la réclamation
            Reclamations::create([
                'name' =>  $etudiantParNom->Nom . ' ' . $etudiantParNom->Prenom,
                'email' => $request->email,
                'apogee' => $request->apogee,
                'cin' => $etudiantParCin->CIN,
                'description' => $request->description,
            ]);

            return back()->with('success', 'Votre demande est envoyée avec succès');
        } elseif (!$etudiantParEmail) {
            return back()->with('error', 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer');
        } elseif (!$etudiantParApogee) {
            return back()->with('error', 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer');
        } else{
            return back()->with('error', 'Étudiant non trouvé avec les informations saisis, Veuillez réesayer');
        }
    }
}
