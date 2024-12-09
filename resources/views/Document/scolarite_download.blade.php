<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <style>
        img {
            max-width : 200px ; 
            align-content: center;
        }
    img.displayed {
        display: block;
        margin-left: auto;
        margin-right: auto ;
        width :200px;
        height : 150px;}
    </style>
    @include('admin.css')
</head>
<body>
<div align="center"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('adminDash/images/ecole.png'))) }}"></div>
<p style="text-align: center;">UNIVERSITE ABDELMALEK ESSAADI</p>
<p style="text-align: center;">Ecole Nationale des Sciences Appliquées</p>

<h2 style="text-align: center;"><strong>ATTESTATION DE SCOLARITé</strong></h2>
<p>&nbsp;</p>
<p>&nbsp; Le Directeur de l'Ecole Nationale des Sciences Appliquées de Tétouan, atteste que :</p>
<p>&nbsp; Mr. (Mlle):{{$demande->Nom}} {{$demande->Prenom}}</p>
<p>&nbsp; CIN :  {{$etudiant->CIN}}</p>
<p>&nbsp; CNE :  {{$demande->CNE}}</p>
<p>&nbsp; N&deg; Apog&eacute;e: {{$demande->Appogé}}</p>
<p>&nbsp; Etudie&nbsp;&agrave; l'ENSA de T&eacute;touan, en  {{$etudiant->Niveau}} Filière {{$etudiant->filiere}}</p>
<p>&nbsp; Pour l'ann&eacute;e universitaire : 2023/2024.</p>
<p>&nbsp; La pr&eacute;sente attestation est d&eacute;livr&eacute;e &agrave; l'int&eacute;ress&eacute; (e) pour servir et valoir ce que de droit.</p>
<p>&nbsp; Fait &agrave; T&eacute;touan, le: @php echo now()->format('Y-m-d') @endphp</p>
<p>&nbsp;</p>
<p style="text-align: center;">Pour le Directeur:</p>
<p style="text-align: center;">Le Chef du Service Scolaire Ihssan El Koujjani</p>
<div align="center"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('adminDash/images/signaturo.jpg'))) }}"></div>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">Ecole Nationale des Sciences Appliqu&eacute;es de T&eacute;touan. BP 2222M'hannech 11-T&eacute;touan Tel 0539 68 80 27; Fax. 0539 99 46 24 www.ensate.une.ma</p>
</body>
</html>
