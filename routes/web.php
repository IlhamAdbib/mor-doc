<?php

use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DemanderController;
use App\Http\Controllers\ReclamerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController ;
use App\Http\Controllers\decesController ;
use App\Http\Controllers\residenceController ;
use App\Http\Controllers\authController ;


use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//page d'acceiul :
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    function () {
    return view('dashboard');
}) ->name('dashboard');

//admin home :
Route::get('/redirect', [AdminController::class, 'redirect']);
//page : traitement de demandes :
Route::get('/view_demandes',[AdminController::class, 'view_demandes']);
//Historique page :
Route::get('/historique',[AdminController::class, 'historique']);
Route::get('/espace_demande',[AdminController::class, 'espace_demande']);
Route::get('/a_reussite',[AdminController::class, 'a_reussite']);
Route::get('/a_scolarite',[AdminController::class, 'a_scolarite']);
Route::get('/r_note',[AdminController::class, 'r_note']);
Route::get('/c_stage',[AdminController::class, 'c_stage']);
//Store :
Route::post('/espace_demande', [DemandeController::class, 'store1']);

//verification
Route::get('/espace_demande', [DemandeController::class, 'index']);
Route::post('/espace_demande/check', [DemandeController::class, 'check'])->name('espace_demande.check');
//afficher les demandes selon le types :
Route::get('/releve_note' ,[DemandeController::class, 'index1']);
Route::get('/releve_note/{id}' ,[DemandeController::class, 'show'])->name('admin.show');

Route::get('/attestation_scolarite' ,[DemandeController::class, 'index2']);
Route::get('/attestation_scolarite/{id}' ,[DemandeController::class, 'show'])->name('admin.show');

Route::get('/attestation_reussite' ,[DemandeController::class, 'index3']);
Route::get('/attestation_reussite/{id}' ,[DemandeController::class, 'show'])->name('admin.show');

Route::get('/convention_stage' ,[DemandeController::class, 'index4']);
Route::get('/convention_stage/{id}' ,[DemandeController::class, 'show'])->name('admin.show');

//Refuse :
Route::post('/releve_note/{id}',[DemandeController::class, 'refuse']);
Route::post('/attestation_scolarite/{id}',[DemandeController::class, 'refuse']);
Route::post('/attestation_reussite/{id}',[DemandeController::class, 'refuse']);
Route::post('/convention_stage/{id}',[DemandeController::class, 'refuse']);
// Route::get("/{category}/{id}/v",[DemandeController::class, 'valide']);
//Historique :
Route::get('/historique',[DemandeController::class, 'index5']);

//voir detail
// Route::get('/historique', [DemandeController::class, 'view']);
//search :
Route::get('/search',[DemandeController::class, 'search']);
Route::get('/view_detail/{id}', [DemandeController::class, 'viewDetails']);

//Document :
//dompdf

//pour voir le document
Route::get('réussite/{id}', [PdfController::class, 'viewPdf']);
Route::get('convention_view/{id}', [PdfController::class, 'viewPdf1']);
Route::get('releve_view/{id}', [PdfController::class, 'viewPdf2']);
Route::get('scolarite_view/{id}', [PdfController::class, 'viewPdf3']);

Route::get('réussite/{id}', [DemandeController::class, 'valide']);
Route::get('convention_view/{id}', [DemandeController::class, 'valide']);
Route::get('releve_view/{id}', [DemandeController::class, 'valide']);
Route::get('scolarite_view/{id}', [DemandeController::class, 'valide']);




//pour télecharger le document

Route::get('réussite/réussite_download/{id}', [PdfController::class, 'generatepdf']);
Route::get('convention_view/convention_download/{id}', [PdfController::class, 'generatepdf1']);
Route::get('releve_view/releve_download/{id}', [PdfController::class, 'generatepdf2']);
Route::get('scolarite_view/scolarite_download/{id}', [PdfController::class, 'generatepdf3']);

//----------
// Route::get('/out', function () {
//     Auth::logout();
//     return redirect('/');
// })->middleware(['auth']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Envoi de doc
Route::get('/send/{id}', [PdfController::class, 'send']);

Route::get('/doc/{id}', [PdfController::class,'download']);

require __DIR__.'/auth.php';


//pour acceder a la page de reclamations
//Route::get('/reclamer',[ReclamerController::class,'reclamer'])->name('reclamer');
//pour l'envoi de la reclamation
//Route::post('/reclamer',[ReclamerController::class,'reclamerPost'])->name('reclamer');
Route::get('/reclamer', [ReclamerController::class, 'reclamer'])->name('reclamer');
Route::post('/reclamer', [ReclamerController::class, 'reclamerPost'])->name('reclamer');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/welcome', function() {
    return view('Citoyen_espace');
})->name('Citoyen_espace')->middleware('auth');

Route::get('/reclamations', [AuthController::class, 'showUserReclamations'])
    ->name('reclamations')
    ->middleware('auth');

Route::get('/document-requests', [AuthController::class, 'showDocumentRequests'])->name('document_requests');
Route::get('/download-pdf/{id}', [AuthController::class, 'downloadPdf'])->name('download_pdf');
Route::get('/download-birth-pdf/{id}', [AuthController::class, 'downloadBirthPdf'])->name('download_birth_pdf');
Route::get('/download-residence-pdf/{id}', [AuthController::class, 'downloadResidencePdf'])->name('download_residence_pdf');

Route::get('/agent-espace', function () {
    return view('Agent_espace');
})->name('Agent_espace');

Route::get('/document_requests_agent', [AuthController::class, 'showAgentDocumentRequests'])->name('document_requests_agent');
Route::get('/reclamations_agent', [AuthController::class, 'showAgentReclamations'])->name('reclamations_agent');

Route::post('/reclamations_agent/reply/{id}', [AuthController::class, 'reply'])->name('reclamations.reply');

Route::post('/api/send-document/{id}', [AuthController::class, 'sendDocument']);

Route::post('/send-email/{type}/{id}', [AuthController::class, 'sendEmailNotification']);

Route::get('/send-birth-certificate/{id}', [AuthController::class, 'sendBirthCertificate'])->name('send_birth_certificate');
Route::get('/send-death-certificate/{id}', [AuthController::class, 'sendDeathCertificate'])->name('send_death_certificate');
// Route::post('/reclamations/{id}/respond', [AuthController::class, 'respondToReclamation'])->name('reclamations_agent.respond');
// Route::post('/reclamations/{id}/respond', [AuthController::class, 'respond'])->name('reclamations.respond');

// //pour acceder a la page de demande d'attestation de reussite
// Route::get('/reussite',[ReussiteController::class,'reussite'])->name('reussite');
// //pour l'envoi de la demande d'attestation de reussite
// Route::post('/reussite',[ReussiteController::class,'reussitePost'])->name('reussite');

// //pour acceder a la page de demande de releve de notes
// Route::get('/releve',[ReleveController::class,'releve'])->name('releve');
// //pour l'envoi de la demande de releve de notes
// Route::post('/releve',[ReleveController::class,'relevePost'])->name('releve');
// //pour acceder a la page de demande d'attestation de scolarite
// Route::get('/scolarite',[ScolariteController::class,'scolarite'])->name('scolarite');
// //pour l'envoi de la demande d'attestation de scolarite
// Route::post('/scolarite',[ScolariteController::class,'scolaritePost'])->name('scolarite');
// //pour acceder a la page de demande de convention de stage
// Route::get('/convention',[ConventionController::class,'convention'])->name('convention');
// //pour l'envoi de la demande de convention de stage
// Route::post('/convention',[ConventionController::class,'ConventionPost'])->name('convention');

//DEMANDE ACTE DE NAISSANCE
Route::get('/demande', [DemanderController::class, 'demande'])->name('demande');
Route::post('/demande', [DemanderController::class, 'store'])->name('demande.store');
Route::get('/get-cities/{regionId}', [DemanderController::class, 'getCities']);
Route::get('/get-communes/{cityId}', [DemanderController::class, 'getCommunes']);
Route::get('/get-bureaux/{cityId}', [DemanderController::class, 'getBureaux']);
Route::get('/demande/create', [DemanderController::class, 'create'])->name('demande.create');

//DEMANDE ACTE DE DECES
Route::get('/deces',[decesController::class,'deces'])->name('deces');
//pour l'envoi de la demande des documents
Route::post('/deces', [decesController::class, 'store'])->name('deces.store');
Route::get('/get-cities/{regionId}', [decesController::class, 'getCities']);
Route::get('/get-communes/{cityId}', [decesController::class, 'getCommunes']);
Route::get('/get-bureaux/{cityId}', [decesController::class, 'getBureaux']);

//DEMANDE ACTE DE RESIDENCE
Route::get('/residence',[residenceController::class,'residence'])->name('residence');
//pour l'envoi de la demande des documents
Route::post('/residence',[residenceController::class,'demandePost'])->name('residence');

Route::get('/espace', function () {
    return view('etudiant.espace_demande');
})->name('espace');

Route::get('/reclam',[DemandeController::class, 'reclam']);
// Route::get('/reclamations', [ReclamerController::class, 'showReclamations']);
Route::get('/reclam', [DemandeController::class, 'showReclamations']);
