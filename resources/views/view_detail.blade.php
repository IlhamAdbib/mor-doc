<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{url('etudiant/assets/css/style1.css')}}" rel="stylesheet" type="text/css">


    </head>
    <body>
        <div class="wrapper">
            @include('admin.sidebar')

            <h2>Détails de la demande: </h2>

            <form action="" method="" enctype="multipart/form-data">
            @csrf
                <div class="userDet">
                    <div class="input-box">
                     <label>Type demande</label>
                        <input type="text" name="Type" value={{$data['Type']}}>
                    </div>
                    <div class="input-box">
                        <label>Nom étudiant</label>
                        <input type="text"  name="Nom" value={{$data['Nom']}}>
                    </div>
                    <div class="input-box">
                        <label>Prénom étudiant</label>
                        <input type="text"  name="Prenom" value={{$data['Prenom']}} >
                    </div>
                    <div class="input-box">
                        <label>Appogé étudiant</label>
                        <input type="text"  name="Appogé" value={{$data['Appogé']}}>
                    </div>
                    <div class="input-box">
                        <label>CNE étudiant</label>
                        <input type="text"  name="CNE" value={{$data['CNE']}}>
                    </div>
                    <div class="input-box">
                        <label>Email étudiant</label>
                        <input type="text"  name="Email" value={{$data['Email']}}>
                    </div>
@if($data['Validation']==='n')
<div class="input-box">
    <label>Motif de refus</label>
    <input type="text"  name="Motif" value={{$data['Motif']}}>
</div>
@endif
@if($data['Type']==='Convention de stage')
                    <div class="input-box">
                        <h4>Reçu d'assurance</h4>
                        <input type="text"  name="image" value={{$data['image']}}>
                    </div>
@endif
                    <div class="input-box">
                        <label>Date envoi</label>
                        <input type="text"  name="Email" value={{$data['created_at']}}>


            </form>

        </div>
    </div>

    <a href="{{url('historique')}}">Historique</a>
 </div>
    </body>
</html>
