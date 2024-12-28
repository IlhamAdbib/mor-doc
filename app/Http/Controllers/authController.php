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
use App\Mail\ReclamationResponseMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentRequestMail;
use App\Mail\BirthCertificateMail;
use App\Mail\DocumentSentMail;

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
        
            // Vérifier si le CIN et le mot de passe correspondent à l'agent
            if ($request->input('cin') === 'L123456' && $request->input('password') === '123') {
                // Rediriger vers la vue Agent_espace
                return redirect()->route('Agent_espace');
            }

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
        $html = view('pdf.document_birth', compact('document'))->render();

        // Générer le PDF
        $pdf = Pdf::loadHTML($html);

        // Télécharger le fichier PDF
        return $pdf->download("document_{$id}.pdf");
    }
    
    public function downloadResidencePdf($id)
    {
        // Recherche générique de la demande parmi tous les types
        $document = ResidenceCertificateRequest::find($id);

        if (!$document) {
            abort(404, 'Document non trouvé.');
        }

        // Générer le contenu HTML pour le PDF
        $html = view('pdf.document_residence', compact('document'))->render();

        // Générer le PDF
        $pdf = Pdf::loadHTML($html);

        // Télécharger le fichier PDF
        return $pdf->download("document_{$id}.pdf");
    }

    public function showAgentDocumentRequests()
    {
        // Récupérer les demandes pour chaque type de document
        $birthRequests = BirthCertificateRequest::get();
        $deathRequests = DeathCertificateRequest::get();
        $residenceRequests = ResidenceCertificateRequest::get();
        // Exemple : Passer des données spécifiques si nécessaire
        return view('document_requests_agent', compact('birthRequests', 'deathRequests', 'residenceRequests'));
    }

    public function showAgentReclamations()
    {
        // Récupérer les réclamations associées
        $reclamations_agent = Reclamations::get();

        // Retourner la vue avec les réclamations
        return view('reclamations_agent', compact('reclamations_agent'));
    }

    public function reply(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'reply_text' => 'required|string|max:1000',
        ]);

        // Récupérer la réclamation
        $reclamation = Reclamations::findOrFail($id);

        // Envoyer l'email
        /*Mail::raw("Bonjour,\n\nVotre réclamation a été bien traitée. Voici notre réponse :\n\n{$request->reply_text}\n\nCordialement,\nService client.", function ($message) use ($reclamation) {
            $message->to($reclamation->email)
                    ->subject('Réponse à votre réclamation');
        });*/

        Mail::raw("السلام عليكم،\n\nتمت معالجة شكواكم بنجاح. هذا هو ردنا:\n\n{$request->reply_text}\n\nمع أطيب التحيات،\nخدمة العملاء.", function ($message) use ($reclamation) {
            $message->to($reclamation->email)
                    ->subject('رد على شكواكم');
        });        

        // Mettre à jour le statut de la réclamation
        $reclamation->statut = 'Traitée';
        $reclamation->save();

        // Retourner une réponse ou rediriger
        return redirect()->route('reclamations_agent')->with('success', 'Réponse envoyée avec succès et statut mis à jour.');
    }

    /*
    public function sendBirthCertificate($id)
    {
        // Recherche de la demande
        $document = BirthCertificateRequest::find($id);

        // Récupérer la réclamation
        $email = $document->email;

        Mail::raw("السلام عليكم،\n\nنود إبلاغكم بأن طلبكم لاستخراج وثيقة شهادة الميلاد قد أصبح جاهزًا.\n\nمع أطيب التحيات،\nخدمة العملاء.", function ($message) use ($document) {
            $message->to($document->email)
                    ->subject('إشعار بجاهزية وثيقة شهادة الميلاد');
        });

        $document->statut = 'Acceptée';

        $document->save();

        return redirect()->route('document_requests_agent');
            
    }*/

    public function sendBirthCertificate($id)
    {
        // Recherche de la demande
        $document = BirthCertificateRequest::find($id);

        if (!$document) {
            abort(404, 'Document non trouvé.');
        }

        // Générer le contenu HTML pour le PDF
        $html = view('pdf.document_birth', compact('document'))->render();

        // Générer le PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);

        // Sauvegarder le PDF temporairement
        $pdfPath = storage_path("app/public/document_{$id}.pdf");
        $pdf->save($pdfPath);

        // Envoyer l'email avec le PDF en pièce jointe
        Mail::raw("السلام عليكم،\n\nنود إبلاغكم بأن طلبكم لاستخراج وثيقة شهادة الميلاد قد أصبح جاهزًا.\n\nمع أطيب التحيات،\nخدمة العملاء.", function ($message) use ($document, $pdfPath) {
            $message->to($document->email)
                    ->subject('إشعار بجاهزية وثيقة شهادة الميلاد')
                    ->attach($pdfPath); // Ajouter la pièce jointe
        });

        // Mettre à jour le statut de la demande
        $document->statut = 'Acceptée';
        $document->save();

        // Supprimer le fichier PDF temporaire après l'envoi
        unlink($pdfPath);

        return redirect()->route('document_requests_agent')->with('success', 'تم إرسال الوثيقة بنجاح.');
    }

    public function sendDeathCertificate($id)
    {
        // Recherche de la demande
        $document = DeathCertificateRequest::find($id);

        if (!$document) {
            abort(404, 'Document non trouvé.');
        }

        // Générer le contenu HTML pour le PDF
        $html = view('pdf.document', compact('document'))->render();

        // Générer le PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);

        // Sauvegarder le PDF temporairement
        $pdfPath = storage_path("app/public/document_{$id}.pdf");
        $pdf->save($pdfPath);

        // Envoyer l'email avec le PDF en pièce jointe
        Mail::raw("السلام عليكم،\n\nنود إبلاغكم بأن طلبكم لاستخراج وثيقة شهادة الوفاة قد أصبح جاهزًا.\n\nمع أطيب التحيات،\nخدمة العملاء.", function ($message) use ($document, $pdfPath) {
            $message->to($document->recipient_email)
                    ->subject('إشعار بجاهزية وثيقة شهادة الوفاة')
                    ->attach($pdfPath); // Ajouter la pièce jointe
        });

        // Mettre à jour le statut de la demande
        $document->statut = 'Acceptée';
        $document->save();

        // Supprimer le fichier PDF temporaire après l'envoi
        unlink($pdfPath);

        return redirect()->route('document_requests_agent')->with('success', 'تم إرسال الوثيقة بنجاح.');
    }

}
