<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Citoyen; // Remarquez qu'il s'agit de votre modèle 'Citoyen' ici
use App\Models\Reclamations;
use App\Models\BirthCertificateRequest;
use App\Models\DeathCertificateRequest;
use App\Models\ResidenceCertificateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Gérer la tentative de connexion
     */
    /*
    public function login(Request $request)
    {
        // Valider la requête entrante
        $request->validate([
            'cin' => 'required|string',
            'password' => 'required|string'
        ]);

        // Trouver le citoyen par le numéro de CNI
        $citoyen = User::where('cin', $request->input('cin'))->first();

        // Vérifier si le citoyen existe et si le mot de passe correspond
        if ($citoyen && $citoyen->password === $request->input('password')) {
            // Authentifier l'utilisateur
            Auth::login($citoyen);

            // Rediriger vers la page de bienvenue ou tableau de bord
            return redirect()->route('Citoyen_espace');
        } else {
            return back()->withErrors(['cin' => 'Identifiant ou mot de passe incorrect.']);
        }
        
    }
        */

        public function login(Request $request)
        {
            // Valider les entrées
            $request->validate([
                'cin' => 'required|string',
                'password' => 'required|string',
            ]);
        
            // Rechercher l'utilisateur par CIN
            $user = User::where('cin', $request->input('cin'))->first();
        
            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($user && $user->password === $request->input('password')) {
                // Connecter l'utilisateur
                Auth::login($user);
        
                // Rediriger vers le tableau de bord
                return redirect()->route('Citoyen_espace');
            }
        
            // Si les informations sont incorrectes
            return back()->withErrors(['error' => 'CIN ou mot de passe incorrect.'])->withInput();
        }

    /**
     * Déconnexion de l'utilisateur
     */
    public function logout()
    {
        return redirect('/login');
    }

    public function showUserReclamations()
    {
        // Récupérer le CIN de l'utilisateur connecté
        $cin = Auth::user()->cin;

        // Récupérer les réclamations associées
        $reclamations = Reclamations::where('cin', $cin)->get();

        // Retourner la vue avec les réclamations
        return view('reclamations', compact('reclamations'));
    }

    public function showDocumentRequests()
    {
        // Récupérer le CIN de l'utilisateur connecté
        $cin = Auth::user()->cin;

        // Récupérer les demandes pour chaque type de document
        $birthRequests = BirthCertificateRequest::where('cin', $cin)->get();
        $deathRequests = DeathCertificateRequest::where('requester_cnie_number', $cin)->get();
        $residenceRequests = ResidenceCertificateRequest::where('cin', $cin)->get();

        // Passer les données à la vue
        return view('document_requests', compact('birthRequests', 'deathRequests', 'residenceRequests'));
    }

}
