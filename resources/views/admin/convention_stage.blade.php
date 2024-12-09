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
            <center><h1 style="font-size: 30px; font-weight:500;">{{'CONVENTION DE STAGE'}}</h1></center> 
            <!-- start projects table-->
            <div class="projects p-20 bg-white rad-10 m-20">
                <div class="responsive-table">
                <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td style="background-color: skyblue; color:white;">NOM D'ETUDIANT</td>
                                <td style="background-color: skyblue; color:white;">CNE</td>
                                <td style="background-color: skyblue; color:white;">APOGEE</td>
                                <td style="background-color: skyblue; color:white;">DATE DE RECEPTION</td>
                                <td style="background-color: skyblue; color:white;">DETAILS DEMANDE</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demandes as $demande)
                            @if(($demande ->Type == 'Convention de Stage') && ($demande -> Etat == 'n'))
                            <tr>
                                <td>{{$demande->Nom.' '.$demande->Prenom}}</td>
                                <td>{{$demande->CNE}}</td>
                                <td>{{$demande->Appogé}}</td>
                                <td>{{$demande->created_at}}</td>
                                <td>
                                <a href='{{route("admin.show", $demande->id)}}' class="visit d-block fs-14 rad-6 bg-black c-black w-fit btn-shape"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>