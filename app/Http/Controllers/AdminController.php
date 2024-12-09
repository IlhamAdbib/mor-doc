<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class AdminController extends Controller
{
    public function redirect(){
        $demandes = Demande::all();
        
            $demandes =Demande::where('Etat','Like','t')->count();
            $demandesn =Demande::where('Etat','Like','n')->count();
            $demandesv =Demande::where('Validation','Like','y')->count();
            $demandesnv = demande::where('Validation','Like','n')->count(); 
            $demandeatte=Demande::where('Type','Like','Attestation de scolarité')->count();
            $demandereussi=Demande::where('Type','Like','Attestation de reussite')->count();
            $demandereleve=Demande::where('Type','Like','Relevé de notes')->count();
            $demandeconv=Demande::where('Type','Like','Convention de stage')->count();
            return view('admin.home',compact('demandes' ,'demandesn','demandeatte','demandereussi','demandereleve','demandeconv','demandesv','demandesnv'));
}
    
    public function view_demandes(){
        return view('admin.view_demandes'); 
    }
    public function releve_note(){
        return view('admin.releve_note');
    }
    public function attestation_scolarite(){
        return view('admin.attestation_scolarite');
    }
    public function convention_stage(){
        return view('admin.convention_stage');
    }
    public function attestation_reussite(){
        return view('admin.attestation_reussite');
    }
    public function historique(){
        return view('admin.historique');
    }
    //etudiant :
    public function espace_demande() {
        return view('etudiant.espace_demande');
    }
    public function r_note() {
        return view('etudiant.r_note');
    }
    public function a_scolarite() {
        return view('etudiant.a_scolarite');
    }
    public function a_reussite() {
        return view('etudiant.a_reussite');
    }
    public function c_stage() {
        return view('etudiant.c_stage');
    }
}
