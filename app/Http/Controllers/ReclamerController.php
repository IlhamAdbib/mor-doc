<?php

namespace App\Http\Controllers;

use App\Models\Reclamations;
use Illuminate\Http\Request;

class ReclamerController extends Controller
{
    // Afficher le formulaire de réclamation
    public function reclamer()
    {
        return view('reclamer');
    }

    // Enregistrer la réclamation dans la base de données
    public function reclamerPost(Request $request)
    {
        // Valider les données fournies
        $request->validate([
            'email' => 'required|email',
            'cin' => 'required|string|max:50',
            'description' => 'required|string|max:500',
        ]);

        // Enregistrer les données dans la base de données
        Reclamations::create([
            'email' => $request->email,
            'cin' => $request->cin,
            'description' => $request->description,
            'statut' => 'En cours',
        ]);

        // Retourner un message de succès
        return back()->with('success', 'تم إرسال شكواك بنجاح');
    }
}
