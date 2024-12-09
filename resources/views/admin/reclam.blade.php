<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="page d-flex">
        @include('admin.sidebar')
        <div class="content w-full"  style="background-color: white;">
            <!-- start head -->
            @include('admin.nav')
            <!-- end head -->
            <center><h1 style="font-size: 30px; font-weight:500;">{{'RECLAMATIONS RECUES'}}</h1></center> 
            <!--<h1 class="m-0" style="text-align: center; font-weight:300; font-size:25px; background-color: rgba(255, 255, 255, 0.445);">Bienvenue dans l'espace où vous pouvez gérer les demandes des documents des étudiants facilement!</h1>-->
            <!-- start projects table-->
            <div class="projects p-20 bg-white rad-10 m-20">
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td style="background-color: skyblue; color:white;">APOGEE</td>
                                <td style="background-color: skyblue; color:white;">CIN</td>
                                <td style="background-color: skyblue; color:white;">NOM D'ETUDIANT</td>
                                <td style="background-color: skyblue; color:white;">DESCRIPTION</td>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                            @foreach($reclamations as $reclamation)
                                <tr>
                                    <td>{{ $reclamation->apogee }}</td>
                                    <td>{{ $reclamation->cin }}</td>
                                    <td>{{ $reclamation->name }}</td>
                                    <td>{{ $reclamation->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>