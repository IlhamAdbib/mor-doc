<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css')
</head>
<body>
    <div class="page d-flex">
        @include('admin.sidebar')
        <div class="content w-full mb-40"  style="background-color: white;">
            <!-- start head -->
            @include('admin.nav')
            <!-- end head -->
            <center><h1 style="font-size: 30px; font-weight:500;">{{$demande->Type}}</h1></center> 
            <!--<h1 class="p-relative"></h1>-->
            <div class="wrap">
                @if (session('msg'))
                        <h1>Demande Validé avec Succés</h1> 
                        @endif
            <h2>{{$demande->Nom.' '.$demande->Prenom}}</h2>
            <form action="" method="" enctype="">
                <div class="userDet">
                    <div class="input-box">
                        <label class='' for="">Nom:</label>
                        <input type="text" placeholder="Nom" value="{{$demande->Nom}}" required disabled>
                    </div>
                    <div class="input-box">
                    <label for="">Prenom:</label>
                        <input type="text" placeholder="Prénom" value="{{$demande->Prenom}}" required disabled>
                    </div>
                    <div class="input-box">
                    <label for="">Apogée:</label>
                        <input type="text" placeholder="Code Apogée" value="{{$demande->Appogé}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">CNE:</label>
                        <input type="text" placeholder="CNE" value="{{$demande->CNE}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Email:</label>
                        <input type="email" placeholder="Email" value="{{$demande->Email}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Niveau</label>
                        <input type="text" placeholder="Niveau" value="{{$etudiant->Niveau}}" required disabled>
                    </div>
                    @if($demande->Type == 'Relevé de Notes')
                    <div class="input-box">
                        <label for="">Semestre Demandé:</label>
                        <input type="text" placeholder="Semestre Demandé" value="{{$demande->Semestre}}" required disabled>
                    </div>
                    @endif
                    @if($demande->Type == 'Convention de Stage')
                    <div class="input-box">
                        <label for="">Nom d'entreprise:</label>
                        <input type="text" value="{{$demande->nomEntreprise}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Representant d'entreprise:</label>
                        <input type="text" value="{{$demande->representant}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Adresse email d'entrepris:</label>
                        <input type="text" value="{{$demande->adressMail}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Tele d'entreprise:</label>
                        <input type="text" value="{{$demande->tele}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Adresse reel d'entreprise:</label>
                        <input type="text" value="{{$demande->adresseReel}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Periode de stage:</label>
                        <input type="text" value="{{$demande->periode}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Encadrant d'entreprise:</label>
                        <input type="text" value="{{$demande->encadrantEntreprise}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="">Encadrant d'ecole:</label>
                        <input type="text" value="{{$demande->encadrantEcole}}" required disabled>
                    </div>
                    <div class="input-box">
                        <label for="" class="">Theme de stage:</label>
                        <input type="text" value="{{$demande->themeDeStage}}" required disabled>
                    </div>
                    @endif
                </div>
                </form>
                <div class="between-flex p-relative w-100">
     @switch($demande->Type)
    @case('Attestation de Scolarité')
    <a href="/scolarite_view/{{$demande->id}}" class=" visit d-block fs-14 rad-6 bg-green c-white w-fit btn-shape mr-15 ">Accepter</a>
    @break
    @case('Relevé de Notes')
    <a href="/releve_view/{{$demande->id}}" class=" visit d-block fs-14 rad-6 bg-green c-white w-fit btn-shape mr-15 ">Accepter</a>
        @break

        @case('Attestation de Reussite')
        <a href="/réussite/{{$demande->id}}" class=" visit d-block fs-14 rad-6 bg-green c-white w-fit btn-shape mr-15 ">Accepter</a>
    @break
        @case('Convention de Stage')
        <a href="/convention_view/{{$demande->id}}" class=" visit d-block fs-14 rad-6 bg-green c-white w-fit btn-shape mr-15 ">Accepter</a>
    @break
    @default
    <a href="#" class=" visit d-block fs-14 rad-6 bg-green c-white w-fit btn-shape mr-15 ">Accepter</a>
    @endswitch
                    <a  href="#" id="button" class="visit d-block fs-14 rad-6 bg-red c-white w-fit btn-shape" >Refuser</a>
                </div>
            </div>

            

        </div>
    </div>
    <div class="popup">
        <div class="popup-content">
            <img src="{{url('adminDash/images/close.png')}}" class="close" alt="">
            <img src="{{url('adminDash/images/why.png')}}" class="why" alt="why">
            <form action='{{route("admin.show", $demande->id)}}' enctype="multipart/form-data" method="POST">
            @csrf
                <textarea class="d-block p-10 w-full rad-6 b-solid" placeholder="Ecrire Le motif" name="motif" required></textarea>
                <input type="submit" value="Envoyer a l'etudiant" class="button d-block fs-14 rad-6 bg-blue c-white w-fit btn-shape m-auto b-none">
            </form>
        </div>
    </div>
    <script>
        document.getElementById("button").addEventListener("click",function(){
            document.querySelector(".popup").style.display = "flex";
        })
        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".popup").style.display = "none";
        })
    </script>
     @include('sweetalert::alert')
</body>
</html>
