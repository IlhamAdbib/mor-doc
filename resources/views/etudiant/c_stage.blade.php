<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="etudiant/assets/css/style1.css">
    </head>
    <body>
        <div class="wrapper">
            <h2>Convention de stage </h2>
            @if (session('msg1'))
            <h1>VUELLEZ CONSULTER VOS DONNEES</h1> 
            @endif
            @if (session('msg2'))
            <h1>Demande envoyée</h1> 
            @endif
            <form action="/c_stage" method="post" enctype="multipart/form-data">
            @csrf
                <div class="userDet">
                    <div class="input-box">
                        <input type="text" placeholder="Nom" name="Nom" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Prénom" name="Prenom" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Code Apogée" name="Appogé" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="CNE" name="CNE" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Votre email" name="Email" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Nom d'entreprise" name="N_entreprise" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Representant d'entreprise" name="R_entreprise" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Adresse email d'entreprise" name="A_email" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Tele d'entreprise" name="tele" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Adresse reel d'entreprise" name="A_reel" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Periode de stage" name="P_stage" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Encadrant d'entreprise" name="E_entreprise" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Encadrant d'ecole" name="E_ecole" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Theme de stage" name="T_stage" required>
                    </div>                    
                    <div class="input-box">
                        <h4>Reçu d'assurance</h4>
                        <input type="file"  name="image" accept="image/jpg,image/jpeg,image/png,image/pdf">
                    </div> 
                </div>  
                <div class="input-box button">
                    <input type="Submit" name="submit" value="Enregistrer">
                </div>
                <div class="text">
                    <h3>Revenir a l'espace de demande <a href="{{url('espace_demande')}}">Espace demande</a></h3>
                </div>
            </form>
        </div>
    </body>
</html>