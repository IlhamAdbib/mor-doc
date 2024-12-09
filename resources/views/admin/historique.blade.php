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
            <center><h1 style="font-size: 30px; font-weight:500;">{{'HISTORIQUE DES DEMANDES'}}</h1></center> 
            <!--<h1 class="m-0" style="text-align: center; font-weight:300; font-size:25px; background-color: rgba(255, 255, 255, 0.445);">Bienvenue dans l'espace où vous pouvez gérer les demandes des documents des étudiants facilement!</h1>-->
            <!-- start projects table-->
            <div class="projects p-20 bg-white rad-10 m-20">
            <div class="head bg-white p-15 between-flex">
                    <div class="form-group">
                    <input class="p-10 rad-10 b-solid" type="search" placeholder="Rechercher par: Type document, Etudiant" name="search" id="search" style="width: 160vh; height:50px;">  
                    <!-- <button class="fs-14 rad-6 bg-blue c-white w-fit btn-shape b-none"> Rechercher</button>
                    <button class="fs-14 rad-6 bg-green c-white w-fit btn-shape b-none "> <a href="{{url('/historique')}}" class="text-decoration-none link-dark">Reset</a></button> -->
                    </div>
            </div>
                <div class="responsive-table">
                    <table class="fs-15 w-full">
                        <thead>
                            <tr>
                                <td style="background-color: skyblue; color:white;">DOCUMENT</td>
                                <td style="background-color: skyblue; color:white;">CONFIRMATION</td>
                                <td style="background-color: skyblue; color:white;">NOM D'ETUDIANT</td>
                                <td style="background-color: skyblue; color:white;">STATUS</td>
                                <td style="background-color: skyblue; color:white;">DETAILS DEMANDE</td>
                            </tr>
                        </thead>
                        <tbody class="alldata">
                        @foreach($demandes as $demande)
                        @if($demande -> Etat == 't')
                            <tr>
                            <td>{{$demande['Type']}}</td>
                            <td>
                                <?php
                                $date1=date_create($demande['created_at']);
                                $date2=date_create(date('y-m-d'));
                                $diff=date_diff($date1,$date2);
                                echo $diff->format("Il y a %a Jours");
                                ?>
                            </td>
                            <td>{{$demande['Nom']}} {{$demande['Prenom']}}</td>
                        @if($demande['Validation']==='y')
                            <td>
                                Acceptée
                            </td>
                        @else
                            <td>
                                Refusée
                            </td>
                        @endif
                            <td>
                                <div class="visit d-block fs-14 rad-6 c-white w-fit btn-shape" style="background-color: lightgreen; text-align: center;">
                                    <a href="view_detail/{{$demande['id']}}" style="color: white; text-decoration: none;">Consulter</a>
                                </div>
                                
                            </td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                        <tbody id="Content" class="searchdata">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#search').on('keyup', function(){
                $value=$(this).val();
                if($value){
                    $('.alldata').hide() ;
                    $('.searchdata').show();
                }
                else {
                    $('.alldata').show() ;
                    $('.searchdata').hide();
                }
                $.ajax({
                    type:'get',
                    url:"{{URL::to('search')}}",
                    data:{'search':$value},
                    success:function(data){
                        $('#Content').html(data);
                    }
                });
            })
        </script>
</body>
</html>