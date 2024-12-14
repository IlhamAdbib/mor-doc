<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class decesController extends Controller
{
    public function deces(){
        return view('deces');
    }

    //enregistrer les informations de reclamation
    public function demandePost(Request $request){

    }}