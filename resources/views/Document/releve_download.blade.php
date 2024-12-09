<html>
<head>
    <style>
        body {
            font-size: 0.3cm;
        }
        img {
                max-width : 200px ; 
            }
        table {
        border: medium solid #000000;
        width: 50%;
        }
        td, th {
        border: thin solid #595a5c;
        width: 50%;
        }
    </style>
        @include('admin.css')
</head>  
<body>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('adminDash/images/ecole.png'))) }}">
    <p style="text-align: center;">Universite Abdelmalek Essaadi</p>
    <p style="text-align: center;">Ecole Nationale des Sciences Appliquees Tetouan</p>
    <h4 style="text-align: center;">Releve des notes de {{$demande->Semestre}}</h4>
    <h4 style="text-align: center;"><span style="color: #ff0000;"><strong><u>Filiere : </u></strong></span></h4>
    <h4 style="text-align: center;">Annee universitaire : 2023-2024</h4>
    <h4>L&rsquo;eleve Ingenieur :</h4>
    <h4>{{$demande->Nom}} <strong>{{$demande->Prenom}}</strong></h4>
    <h4>CNE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>:{{$demande->CNE}}</strong></h4>
    <h4>Code Apogee&nbsp; <strong>:{{$demande->Appogé}} </strong></h4>
    <h3>A obtenu les resultats suivants pour le semestre {{$demande->Semestre}}</h3>
    <table >
    <tbody>

    <tr>
    <td width="160">
    <p><strong>Intitule du Module</strong></p>
    </td>
    <td width="170">
    <p><strong>Note/20</strong></p>
    </td>
    </tr>
    <tr>
    <td width="160">
    <p><strong>{{$note->Module1}}</strong></p>
    </td>
    <td width="170">
    <p>{{$note->Note2}}</p>
    </td>
    </tr>
    <tr>
    <td width="160">
    <p><strong>{{$note->Module2}}</strong></p>
    </td>
    <td width="170">
    <p>{{$note->Note2}}</p>
    </td>
    </tr>
    <tr>
    <td width="160">
    <p><strong>{{$note->Module3}}</strong></p>
    </td>
    <td width="170">
    <p>{{$note->Note3}}</p>
    </td>
    </tr>
    <tr>
    <td width="160">
    <p><strong>{{$note->Module4}}</strong></p>
    </td>
    <td width="170">
    <p>{{$note->Note4}}</p>
    </td>
    </tr>
    <tr>
    <td width="160">
    <p><strong>{{$note->Module5}}</strong></p>
    </td>
    <td width="170">
    <p>{{$note->Note5}}</p>
    </td>
    </tr>
    <tr>
    <td width="160">
    <p><strong>{{$note->Module6}}</strong></p>
    </td>
    <td width="170">
    <p>{{$note->Note6}}</p>
    </td>
    </tr>
    <tr>
    <td colspan="2" width="330">
    <p>Points du jury&nbsp;&nbsp;</p>
    </td>
    </tr>

    </tbody>
    </table>
    <p>&nbsp;</p>
    <table >
    <tbody>

    <tr>
    <td width="196">
    <p><strong>Moyenne du l&rsquo;annee</strong></p>
    </td>
    <td width="189">
    <p><strong>
        @php echo App\Http\Controllers\PdfController::Moyenne($demande->Appogé); @endphp
    </strong></p>
    </td>
    </tr>
    <tr>
    <td width="196">
    <p><strong>Resultat de l&rsquo;annee</strong></p>
    </td>
    <td width="189">
    <p><strong>
        @php if (App\Http\Controllers\PdfController::Moyenne($demande->Appogé)>=10){
                echo "Admis";
            }
            else
            echo"Ajourné";

        @endphp
    </strong></p>
    </td>
    </tr>
    </tbody>
    </table>
    <p style="text-align: left;">La presente attestation est delivree &agrave; l&rsquo;interesse(e) pour servir et valoir ce que de droit. Fait a Tetouan, le :&nbsp; &nbsp;<strong>@php echo now()->format('Y-m-d')@endphp</strong></p>
    <p style="text-align: center;"><strong>&nbsp;</strong></p>
    <p style="text-align: left;">AC : Acquis par Compensation&nbsp; NV : Non Valide</p>
    <p style="text-align: left;">N.B. Le present document n&rsquo;est delivre qu&rsquo;en un seul exemplaire. Il appartient a l&rsquo;etudiant d&rsquo;en faire des photocopies certifiees conformes.</p>
</body>
</html>