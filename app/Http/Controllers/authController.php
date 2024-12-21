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

use Barryvdh\DomPDF\Facade\Pdf;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('login');
    }

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

    /*public function downloadPdf($id)
    {
        // Recherche générique de la demande parmi tous les types
        $document = BirthCertificateRequest::find($id) 
                    ?? DeathCertificateRequest::find($id) 
                    ?? ResidenceCertificateRequest::find($id);

        if (!$document) {
            abort(404, 'Document non trouvé.');
        }

        // Générer le contenu HTML pour le PDF
        $html = view('pdf.document', compact('document'))->render();

        // Générer le PDF
        $pdf = Pdf::loadHTML($html);

        // Télécharger le fichier PDF
        return $pdf->download("document_{$id}.pdf");
    }*/

    public function downloadPdf($id)
    {
        // Recherche générique de la demande parmi tous les types
        $document = DeathCertificateRequest::find($id);

        if (!$document) {
            abort(404, 'Document non trouvé.');
        }

        // Générer le contenu HTML pour le PDF
        $html = view('pdf.document', compact('document'))->render();

        // Générer le PDF
        $pdf = Pdf::loadHTML($html);

        // Télécharger le fichier PDF
        return $pdf->download("document_{$id}.pdf");
    }

    public function downloadBirthPdf($id)
    {
        // Recherche générique de la demande parmi tous les types
        $document = BirthCertificateRequest::find($id);

        if (!$document) {
            abort(404, 'Document non trouvé.');
        }

        // Générer le contenu HTML pour le PDF
        $html = view('pdf.document', compact('document'))->render();

        // Générer le PDF
        $pdf = Pdf::loadHTML($html);

        // Télécharger le fichier PDF
        return $pdf->download("document_{$id}.pdf");
    }
}
