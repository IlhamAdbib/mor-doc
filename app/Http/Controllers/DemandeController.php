<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; //MODIF
use Auth;
use App\Models\Demande;
use App\Models\Etudiant;
use App\Models\Reclamations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Note; 
use RealRashid\SweetAlert\Facades\Alert;



class DemandeController extends Controller
{
    function check(Request $request)
    {
        $email = $request->input('email'); 
        $apoge = $request->input('appoge');
        $data_app = Etudiant::where('Appogé' , $apoge)->first();
        $student = Etudiant::where('email', $email)
        ->where('Appogé', $apoge)
        ->first(); 
        if($student){
            return 'email';
        }
        else if($data_app){
            return 'unique' ;
        }
        else
        {
            return 'not_unique';
        } 
    }
    public static function store1(Request $request)
    {
        $email = $request->input('email'); 
        $apoge = $request->input('appoge');  
        $data_app = Etudiant::where('Appogé' , $apoge)->first(); 
        $student = Etudiant::where('email', $email)
        ->where('Appogé', $apoge)
        ->first(); 
        if ($student){
            $etudiant = Etudiant::where('Appogé',$apoge)->first();
                    $demande = new Demande();
                    $demande->Appogé = $apoge;
                    $demande->Email = $email;
                    $demande->Prenom = $etudiant->Prenom;
                    $demande->Nom = $etudiant->Nom;
                    $demande->CNE = $etudiant->CNE;
                    $demande->CIN = $etudiant->CIN;
                    $demande->Type = $request->input('Type');
                    if($demande->Type == 'Convention de Stage') {
                        $demande->nomEntreprise = $request->input('N_entreprise');
                        $demande->representant = $request->input('R_entreprise');
                        $demande->adressMail = $request->input('A_email');
                        $demande->tele = $request->input('tele');
                        $demande->adresseReel = $request->input('A_reel');
                        $demande->periode = $request->input('P_stage');
                        $demande->encadrantEntreprise = $request->input('E_entreprise');
                        $demande->encadrantEcole = $request->input("E_ecole");
                        $demande->themeDeStage = $request->input('T_stage');
                        if ($request->file('image')) {
                            $file = $request->file('image');
                            $filename = date('YmdHi').$file->getClientOriginalName();
                            $file->move(public_path('Image'), $filename);
                            $demande->image = $filename;
                        }
                    }
                    else if($demande->Type == 'Relevé de Notes'){
                        $demande->Semestre = $request->input("semestre");
                    }

                    $demande->save();
                    Alert::success('Demande Envoyé', 'Ca peut prendre du temps');
                    return redirect('/espace_demande');
                }
            }

    function index()
{
 return view('etudiant.espace_demande');
}
    public function index1(){
            $demandes = Demande::all()->sortByDesc("id");
            return view('admin.releve_note')->with([
            'demandes' => $demandes
        ]);
    }
    public function index2(){
        $demandes = Demande::all()->sortByDesc("id");
        return view('admin.attestation_scolarite')->with([
        'demandes' => $demandes
    ]);
    }
    public function index3(){
        $demandes = Demande::all()->sortByDesc("id");
        return view('admin.attestation_reussite')->with([
        'demandes' => $demandes
    ]);
    }
    public function index4(){
        $demandes = Demande::all()->sortByDesc("id");
        return view('admin.convention_stage')->with([
        'demandes' => $demandes
    ]);
    }
    public function show($id)
    {
        $demande = Demande::where('id',$id)->first();
        $appog = $demande->Appogé;
        $etudiant = Etudiant::where('Appogé',$appog)->first();
        $notes = Note::where('Appogé',$appog)->first();
        return view('admin.show')->with([
            'demande' => $demande,
            'etudiant' => $etudiant,
            'notes' => $notes 
        ]);
    }

    public function refuse(Request $request, $id)
    {
        $demande = Demande::where('id',$id)->first();
        $appog = $demande->Appogé;
        $etudiant = Etudiant::where('Appogé',$appog)->first();
        $motif = request("motif") ; 
        $data['motif'] = $motif;
        $etat = "t";
        $validation = 'n' ; 
        Demande:: 
            where('id',$id)
            ->update(['Motif' => $motif, 
            'Etat'=>$etat , 
            'Validation'=>$validation
        ]);
        $data['email'] = $demande->Email;
        $data["title"] = "Demande Refusé: ";
        Mail::send('admin.testno', $data, function ($message) use ($data) {
            $message->to($data["email"])
                ->subject($data["title"].$data['motif']);
        });
        Alert::warning('Demande Refusé', 'Cette demande a été refusé');
        return view('admin.show')->with([
            'demande' => $demande,
            'etudiant' => $etudiant]);
    }
    public function valide(Request $Request,$id){ //modified
        $demande = Demande::where('id', $id)->first();
        $appog = $demande->Appogé;
        $etudiant = Etudiant::where('Appogé',$appog)->first();
        $note = Note::where('Appogé',$appog)->first();
        $etat = "t";
        $validation = 'y';
        //modif
        $filename = date('YmdHi') . 'demande.pdf';
        if($demande->filename === null) { //////MODIF//////IF FILENAME IS NOT ALREADY SET
            Demande::
                where('id', $id)
                ->update([
                    'Etat' => $etat,
                    'Validation' => $validation,
                    'filename' => $filename
                ]);
        }
        else{                           /////////////MODIF//IF ITS SET
            Demande::
                where('id', $id)
                ->update([
                    'Etat' => $etat,
                    'Validation' => $validation
                ]);
        }
        //modification end
        $demande = Demande::find($id);
                $data['email'] = $demande->Email;
                $data['title'] = 'Demande Accepté';
                $data['filename'] = $demande->filename;
                /////////////////////////////////////////////////////////////
                $type = $demande->Type;
                switch ($type){
                        case "Attestation de Reussite":
                                $pdf = PDF::loadView('Document.réussite_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif'])
                                ->save(public_path("documents/".$demande['filename']));

                                break;
                               
                        case "Convention de Stage":
                                $pdf = PDF::loadView('Document.convention_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif'])
                                ->save(public_path("documents/".$demande['filename']));

                                break;
                                
                        case "Relevé de Notes":
                                $appog = $demande->Appogé;
                                $etudiant = Etudiant::where('Appogé',$appog)->first();
                                $note = Note::where('Appogé',$appog)->first();
                                $pdf = PDF::loadView('Document.releve_download', compact('demande', 'id', 'note'))->setOptions(['defaultFont' => 'sans-serif'])
                                ->save(public_path("documents/".$demande['filename']));

                                break;
                                
                        case "Attestation de Scolarité":
                                $appog = $demande->Appogé;
                        $etudiant = Etudiant::where('Appogé',$appog)->first();
                        //$pdf = PDF::loadView('Document.scolarite_download',['demande' => $demande,'etudiant'=>$etudiant]);
                        $pdf = PDF::loadView('Document.scolarite_download', compact('demande', 'id', 'etudiant'))->setOptions(['defaultFont' => 'sans-serif'])
                        ->save(public_path("documents/".$demande['filename']));
                        break;
                                
                }
                /////////////////////////////////////////////////////////////
                for ($i=0;$i<100;$i++){
                        echo " ";
                }
                $files = [
                        public_path("documents/".$data['filename'])
                ];

                Mail::send('admin.test', $data, function ($message) use ($data, $files) {
                        $message->to($data['email'])
                                ->subject($data["title"]);
                        foreach ($files as $file) {
                                $message->attach($file);
                        }
                });
                Alert::success('Demande Validé', 'Document a été envoyé');
                return Redirect()->back();

    }

    //historique :
    //voirl'historique de la demande
    public static function index5()
    {
        $data = Demande::all()->sortByDesc("id");
        return view('admin.historique', ['demandes' => $data]);
    }
    public static function showdetail()
    {
        $data = Demande::all();
        return view('admin.view_detail', ['demandes' => $data]);
    }

    //voir détails de  la demande 

    public function search(Request $request){
        $output="";
        $demandes=Demande::where('Nom','Like','%'.$request->
        search.'%')->orWhere('Type','Like','%'.$request->
        search.'%')->orWhere('Appogé','Like','%'.$request->
        search.'%')->orWhere('Prenom','Like','%'.$request->
        search.'%')->orWhere('CNE','Like','%'.$request->
        search.'%')->get();
        foreach($demandes as $demande)
        {
            $date1=date_create($demande['created_at']);
            $date2=date_create(date('y-m-d'));
            $diff=date_diff($date1,$date2);
            if($demande->Validation == 'y')
            $valide = "<span class='label bg-green c-white btn-shape'>Validé</span>";
            else 
            $valide ="<span class='label bg-red c-white btn-shape'>Refusée</span>";
            $output.=
            '<tr>
                <td>'.$demande->Type.'</td>
                <td>'.
                $diff->format("Il y a %a Jours").
                '</td>
                <td>'.$demande->Nom." ".$demande->Prenom.'</td>
                <td>'.
                    $valide.
                '</td> 
                <td>'.'<a href="view_detail/'.$demande->id .'" class="label bg-blue c-white btn-shape w-fit">'.'<i class="fas fa-eye"></i></a></td>
            </tr>';
        }
        return response($output);
    }
     //voir détails de  la demande
        public function viewDetails($id){
        $data = Demande::find($id);

        $appog = $data->Appogé;
        $etudiant = Etudiant::where('Appogé',$appog)->first();
        return view('admin.view_detail',compact('data','id','etudiant'));

    }

    public function reclam(){
        return view('admin.reclam');
    }

    public function showReclamations()
    {
        $reclamations = Reclamations::all();
    
        return view('admin.reclam')->with('reclamations', $reclamations);

    }
}
