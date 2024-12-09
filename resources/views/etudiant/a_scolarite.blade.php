<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Faire Demande</title>
        <link rel="stylesheet" href="etudiant/assets/css/style1.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        .has-error
        {
            border-color:#cc0000;
            background-color:#ffff99;
        }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h2>Attestation de scolarité</h2>
            @if (session('msg1'))
            <h1>VUELLEZ CONSULTER VOS DONNEES</h1> 
            @endif
            @if (session('msg2'))
            <h1>Demande envoyée</h1> 
            @endif
            <form action="/a_scolarite" method="post" enctype="multipart/form-data">
            @csrf
                <div class="userDet">
                    <div class="input-box">
                        <input type="text" name="appoge" id="appoge" class="form-control input-lg" placeholder="Votre Appoge" required>
                        <span id="error_appoge"></span>
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Votre Email" required>
                        <span id="error_email"></span>
                    </div>
                </div>  
                <div class="form-group" align="center">
                    <input type="Submit" name="register" id="register" value="Registre" class="btn btn-info btn-lg">
                </div>
                <div class="text">
                    <h3>Revenir a l'espace de demande <a href="{{url('espace_demande')}}">Espace demande</a></h3>
                </div>
            </form>
        </div>
    </body>
</html>