<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="etudiant/assets/css/style1.css">
    </head>
    <body>
        <div class="wrapper">
            <h2>Attestation de réussite</h2>
            @if (session('msg1'))
            <h1>VUELLEZ CONSULTER VOS DONNEES</h1> 
            @endif
            @if (session('msg2'))
            <h1>Demande envoyée</h1> 
            @endif
            <form action="/a_reussite" method="post" enctype="multipart/form-data">
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
                        <input type="text" placeholder="Email" name="Email" required>
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