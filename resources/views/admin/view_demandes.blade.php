<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css')
</head>
<body>
    <div class="page d-flex">
        @include('admin.sidebar')
        <div class="content w-full" style="background-color: white;">
            <!-- start head -->
            @include('admin.nav')
            <!-- end head -->
            <center><h1 style="font-size: 30px; font-weight:500;">DEMANDES RECUS</h1></center>
            <div class="services" id="services">
            <div class="container">
                <div class="box">
                <a href="{{url('releve_note')}}"><img src="adminDash/images/received-removebg-preview.png" alt=""> </a>
                    <h3 style="color: black;">RELEVE DE NOTES</h3>
                    <!--<div class="details">
                    </div>-->
                </div>
                <div class="box">
                <a href="{{url('attestation_scolarite')}}"><img src="adminDash/images/received-removebg-preview.png" alt=""></a>
                    <h3 style="color: black;">ATTESTATION DE SCOLARITE</h3>
                    <!--<div class="details">
                    </div>-->
                </div>
                <div class="box">
                    <a href="{{url('convention_stage')}}"><img src="adminDash/images/received-removebg-preview.png" alt=""></a>
                   <h3 style="color: black;">CONVENTION DE STAGE</h3>
                     <!--<div class="details">
                    </div>-->
                </div>
                <div class="box">
                <a href="{{url('attestation_reussite')}}"><img src="adminDash/images/received-removebg-preview.png" alt=""></a>
                        <h3 style="color: black;">ATTESTATION DE REUSSITE</h3>
                    <!--<div class="details">
                    </div>-->
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>