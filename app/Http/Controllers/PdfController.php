<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Etudiant;
use App\Models\Note;
use Illuminate\Support\Collection;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class PdfController extends Controller
{
//pour l'attestation de réussite
public function viewPdf($id){
        $demande = Demande::find($id);
        $pdf = PDF::loadView('Document.réussite_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->stream();
        //return view('Document.réussite',['demande'=>$demande]) ;
}

public function generatepdf($id){
    $demande = Demande::find($id);
                $pdf = PDF::loadView('Document.réussite_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('attestation_réussite.pdf');

}
//pour la convention de stage

public function viewPdf1($id){
        $data = Demande::find($id);
        return view('Document.convention_view',['data'=>$data]) ;

}

public function generatepdf1($id){
        $demande = Demande::find($id);
                $pdf = PDF::loadView('Document.convention_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('convention_stage.pdf');

}
////pour le relevé de notes;
public function viewPdf2($id){
        $note=Note::find($id);
        $demande = Demande::find($id);
        return view('Document.releve_view',['demande'=>$demande,'note'=>$note]) ;

}
//calcul moyenne
        public static function Moyenne($appo)
        {
                $note = Note::where('Appogé',$appo)->first();
                $sum=$note->Note1+$note->Note2+$note->Note3+$note->Note4+$note->Note5+$note->Note6;
                $average = $sum/6;
                return $average;
        }


public function generatepdf2($id){
    $demande = Demande::where('id', $id)->first();
    $appog = $demande->Appogé;
    $etudiant = Etudiant::where('Appogé',$appog)->first();
    $note = Note::where('Appogé',$appog)->first();
                $pdf = PDF::loadView('Document.releve_download', compact('demande', 'id', 'note'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('relevé_note.pdf');

}
//////////POUR ATTESTATION DE SCOLARITé
public function viewPdf3($id)
        {
                $demande = Demande::find($id);
                $appog = $demande->Appogé;
                $etudiant = Etudiant::where('Appogé',$appog)->first();
                return view('Document.scolarite_view', ['demande' => $demande,'etudiant'=>$etudiant]);
        }

        public function generatepdf3($id)
        {
                $demande = Demande::find($id);
                $appog = $demande->Appogé;
                $etudiant = Etudiant::where('Appogé',$appog)->first();
                //$pdf = PDF::loadView('Document.scolarite_download',['demande' => $demande,'etudiant'=>$etudiant]);
                $pdf = PDF::loadView('Document.scolarite_download', compact('demande', 'id', 'etudiant'))->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('attestation_scolarité.pdf');

        }
///////////////////////////////////NEW EMAIL///////////////////////////////////
public function send($id)
        {
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
                Alert::success('Document Envoyé', 'Le document a été renvoyé à l etudiant');
                return Redirect::back()->with('message','Operation Successful !');

        }
public function download($id){
        $demande = Demande::find($id);
        $type = $demande->Type;
        switch ($type){
                case "Attestation de Reussite":
                        $pdf = PDF::loadView('Document.réussite_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif']);

                        return $pdf->download('attestation_réussite.pdf');
                       
                case "Convention de Stage":
                        $pdf = PDF::loadView('Document.convention_download', compact('demande', 'id'))->setOptions(['defaultFont' => 'sans-serif']);

                        return $pdf->download('convention_stage.pdf');
                        
                case "Relevé de Notes":
                        $appog = $demande->Appogé;
                        $etudiant = Etudiant::where('Appogé',$appog)->first();
                        $note = Note::where('Appogé',$appog)->first();
                        $pdf = PDF::loadView('Document.releve_download', compact('demande', 'id', 'note'))->setOptions(['defaultFont' => 'sans-serif']);

                        return $pdf->download('relevé_note.pdf');
                        
                case "Attestation de Scolarité":
                        $appog = $demande->Appogé;
                $etudiant = Etudiant::where('Appogé',$appog)->first();
                //$pdf = PDF::loadView('Document.scolarite_download',['demande' => $demande,'etudiant'=>$etudiant]);
                $pdf = PDF::loadView('Document.scolarite_download', compact('demande', 'id', 'etudiant'))->setOptions(['defaultFont' => 'sans-serif']);
                return $pdf->download('attestation_scolarité.pdf');
                        
        }
        return redirect()->back();
}
///////////////////////////////////////////////////////////////////////////////
}
