<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
    <div class="page d-flex">
        @include('admin.sidebar')
        <div class="content w-full" style="background-color:white;">
            <!-- end head -->
            <center><h1  id="dashboardTitle" class="p-relative" style="font-size: 30px; font-weight:500;"> {{'TABLEAU DE BORD: Espace Admin'}}</h1></center>
            <!-- start wrapper -->
            <div class="wrapper gap-20"  style="background-color: rgba(255, 255, 255, 0.445);">
                <!-- start welcome widget -->
                <div class="welcome p-relative rad-10 text-c-mobile block-mobile" style="background-color: rgba(255, 255, 255, 0.445);">
                    <div class="intro p-20 d-flex space-between bg-eee" style="background-color: rgba(255, 255, 255, 0.445);">
                        <div>
                            <center><h1 style="font-size: 30px; font-weight:500;">{{'TABLEAU DE BORD: Espace Admin'}}</h1></center> 
                            <br><br>
                            <center><img class="hide-in-mobile" src="adminDash\images\welcompic-removebg-preview.png" alt="welcome"></center>
                            <br><br>
                            <h1 class="m-0" style="text-align: center; font-weight:300; font-size:25px; background-color: rgba(255, 255, 255, 0.445);">Bienvenue dans l'espace où vous pouvez gérer les demandes des documents des étudiants facilement!</h1>
                        </div>
                    </div>

                <div class="tickets bg-white rad-10 p-20"  style="background-color: rgba(255, 255, 255, 0.445);">
                    <p class="mt-0 mb-20 c-gray fs-15"></p>
                    <div class="boxs d-grid gap-20"  style="background-color: rgba(255, 255, 255, 0.445);">
                        <div class="box rad-10 b-solid txt-c c-black p-20">
                        <img src="{{url('adminDash/images/received-removebg-preview.png')}}" alt="" >
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandeatte}}</span>
                            <strong> Demandes des attestations de scolarité</strong>
                        </div>
                        <div class="box rad-10 b-solid txt-c c-black p-20">
                          <img src="{{url('adminDash/images/received-removebg-preview.png')}}" alt="" >
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandereussi}}</span>
                            <strong>Demandes des attestations de réussite</strong> 
                        </div>
                        <div class="box rad-10 b-solid txt-c c-black p-20">
                        <img src="{{url('adminDash/images/received-removebg-preview.png')}}" alt="" >
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandeconv}}</span>
                            <strong> Demandes des convention de stage</strong>
                        </div>
                        <div class="box rad-10 b-solid txt-c c-black p-20">
                          <img src="{{url('adminDash/images/received-removebg-preview.png')}}" alt="" >
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandereleve}}</span>
                            <strong>Demandes des relevés de notes </strong> 
                        </div>
                        <div class="box rad-10 b-solid txt-c p-20 bg-white bg-opacity-45">
                            <img src="{{url('adminDash/images/loading-removebg-preview.png')}}" alt="">
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandesn}}</span>
                            <strong>Demandes de documents reçues</strong>
                        </div>                        
                        <div class="box rad-10 b-solid txt-c p-20 c-black">
                        <img src="{{url('adminDash/images/checked-removebg-preview.png')}}" alt="" >
                            <!-- <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i> -->
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandes}}</span>
                            <strong>Demandes de documents consultés</strong>
                        </div>
                        <div class="box rad-10 b-solid txt-c p-20 c-black">
                          <img src="{{url('adminDash/images/listed-removebg-preview.png')}}" alt="" >
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandesv}}</span>
                            <strong>Documents envoyés et validés </strong>
                        </div>
                        <div class="box rad-10 b-solid txt-c p-20 c-black">
                          <img src="{{url('adminDash/images/unchecked-removebg-preview.png')}}" alt="">
                            <span class="d-block fw-bold mt-0 mb-5 fs-25 c-blue">{{$demandesnv}}</span>
                           <strong> Demandes refusés avec motif de refus</strong>
                        </div>
                      </div>
                </div>
            </div> 
        </div>
    </div>
    
<script>
    // Example: Hide the element with the class "p-relative" based on a condition
    var shouldHideElement = true; // Replace with your condition
  
    if (shouldHideElement) {
      document.getElementById('dashboardTitle').style.display = 'none';
    }
  </script>
</body>
</html>

























































