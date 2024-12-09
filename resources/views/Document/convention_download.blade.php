@csrf
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <style>
            img {
                max-width : 200px ; 
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
@include('admin.css')
</head>
<body>
        <div align="center">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('adminDash/images/ecole.png'))) }}">

        <p><strong>Universit&eacute; Abdelmalek Essa&acirc;di</strong></p>
        <p><strong>Ecole Nationale des Sciences Appliqu&eacute;es</strong></p>
        <p><strong>T&eacute;touan</strong></p>
    </div>
        <p>CONVENTION DE STAGE</p>
        <p><em><u>(4 exemplaires imprim&eacute;s en recto-verso)</u></em></p>
        <p>ENTRE</p>
        <p>L&rsquo;Ecole Nationale des Sciences Appliqu&eacute;es, Universit&eacute; Abdelmalek Essa&acirc;di - T&eacute;touan</p>
        <p>B.P. 2222, Mhannech II, T&eacute;touan , Maroc</p>
        <p>T&eacute;l. +212 5 39 68 80 27 ; Fax. +212 39 99 46 24. Web:&nbsp;<a href="https://ensa-tetouan.ac.ma"><strong>https://ensa-tetouan.ac.ma</strong></a></p>
        <p>Repr&eacute;sent&eacute; par le Professeur <strong>REKLAOUI KAMAL</strong> en qualit&eacute; de Directeur.</p>
        <p>Ci-apr&egrave;s, d&eacute;nomm&eacute; <strong>l'Etablissement</strong></p>
        <p>ET</p>
        <p>La Soci&eacute;t&eacute;&nbsp;: <strong>{{$demande->nomEntreprise}}</strong></p>
        <p>Adresse&nbsp;:&nbsp;&nbsp;&nbsp;<strong>{{$demande->adresseReel}}</strong></p>
        <p>T&eacute;l&nbsp;: <strong>{{$demande->tele}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>Email:&nbsp;<strong>{{$demande->adressMail}}</strong></p>
        <p>Repr&eacute;sent&eacute;e par Monsieur <strong>.....................................</strong>en qualit&eacute; <strong>.................................................</strong></p>
        <p>Ci-apr&egrave;s d&eacute;nomm&eacute;e <strong>L&rsquo;ENTREPRISE</strong></p>
        
        <p><strong>Article 1 : Engagement</strong></p>
        <p><strong>L&rsquo;ENTREPRISE</strong> accepte de recevoir &agrave; titre de stagiaire&nbsp;<strong>..............................</strong>&eacute;tudiant de la fili&egrave;re du Cycle Ing&eacute;nieur<strong> &laquo; G&eacute;nie Informatique 1&egrave;re ann&eacute;e &raquo; </strong>de l&rsquo;ENSA de T&eacute;touan, Universit&eacute; Abdelmalek Essa&acirc;di (T&eacute;touan), pour une p&eacute;riode allant du <strong>2024-07-01</strong> au <strong>2024-08-31</strong></p>
        <p><strong>En aucun cas, cette convention ne pourra autoriser les &eacute;tudiants &agrave; s&rsquo;absenter durant la p&eacute;riode des contr&ocirc;les ou des enseignements.</strong></p>
        <p><strong>Article 2 : Objet </strong></p>
        <p>Le stage aura pour objet essentiel d'assurer l'application pratique de l'enseignement donn&eacute; par <strong>l'Etablissement</strong>, et ce, en organisant des visites sur les installations et en r&eacute;alisant des &eacute;tudes propos&eacute;es par <strong>L&rsquo;ENTREPRISE</strong>.</p>
        <p><strong>Article 3 : Encadrement et suivi</strong></p>
        <p>Pour accompagner le Stagiaire durant son stage, et ainsi instaurer une v&eacute;ritable collaboration L&rsquo;ENTREPRISE/Stagiaire/Etablissement, L&rsquo;ENTREPRISE d&eacute;signe Mme/Mr <strong>.....................................</strong>encadrant(e) et parrain(e), pour superviser et assurer la qualit&eacute; du travail fourni par le Stagiaire.</p>
        <p>L'Etablissement d&eacute;signe <strong>......................................... </strong>en tant que tuteur qui procurera une assistance p&eacute;dagogique</p>
        <p><strong>Article 4 : Programme:</strong></p>
        <p>Le th&egrave;me du stage est: <strong>&laquo;&nbsp;...............................................................&nbsp;&raquo;</strong></p>
        <p>Ce programme a &eacute;t&eacute; d&eacute;fini conjointement par <strong>l'Etablissement</strong>, <strong>L&rsquo;ENTREPRISE</strong> et le <strong>Stagiaire</strong>.</p>
        <p>Le contenu de ce programme doit permettre au Stagiaire une r&eacute;flexion en relation avec les enseignements ou le projet de fin d'&eacute;tudes qui s'inscrit dans le programme de formation de <strong>l'Etablissement</strong>.</p>
        
        <p><strong>Article 5 : Indemnit&eacute; de stage</strong></p>
        <p>Au cours du stage, l&rsquo;&eacute;tudiant ne pourra pr&eacute;tendre &agrave; aucun salaire de la part de <strong>L&rsquo;ENTREPRISE</strong>.</p>
        <p>Cependant, si <strong>l&rsquo;ENTREPRISE et</strong> l&rsquo;&eacute;tudiant le conviennent, ce dernier pourra recevoir une indemnit&eacute; forfaitaire de la part de l&rsquo;ENTREPRISE des frais occasionn&eacute;s par la mission confi&eacute;e &agrave; l&rsquo;&eacute;tudiant.</p>
        
        <p><strong>Article 6 : R&egrave;glement </strong></p>
        <p>Pendant la dur&eacute;e du stage, le Stagiaire reste plac&eacute; sous la responsabilit&eacute; de <strong>l'Etablissement</strong>.</p>
        <p><strong>Cependant, l&rsquo;&eacute;tudiant est tenu d&rsquo;informer l&rsquo;&eacute;cole dans un d&eacute;lai de 24h sur toute modification portant sur la convention d&eacute;j&agrave; sign&eacute;e, sinon il en assumera toute sa responsabilit&eacute; sur son non-respect de la convention sign&eacute;e par l&rsquo;&eacute;cole.</strong></p>
        
        <p>Toutefois, le Stagiaire est soumis &agrave; la discipline et au r&egrave;glement int&eacute;rieur de <strong>L&rsquo;ENTREPRISE</strong>.</p>
        <p>En cas de manquement, <strong>L&rsquo;ENTREPRISE</strong> se r&eacute;serve le droit de mettre fin au stage apr&egrave;s en avoir convenu avec le Directeur de l'Etablissement.</p>
        <p><strong>Article 7 : Confidentialit&eacute;&nbsp; </strong></p>
        <p>Le Stagiaire et l'ensemble des acteurs li&eacute;s &agrave; son travail (l'administration de <strong>l'Etablissement</strong>, le parrain p&eacute;dagogique ...) sont tenus au secret professionnel. Ils s'engagent &agrave; ne pas diffuser les informations recueillies &agrave; des fins de publications, conf&eacute;rences, communications, sans raccord pr&eacute;alable de <strong>L&rsquo;ENTREPRISE</strong>. Cette obligation demeure valable apr&egrave;s l'expiration du stage</p>
        <p><strong>Article 8 : Assurance accident de travail&nbsp; </strong></p>
        <p><strong>L'Etablissement</strong> devra obligatoirement souscrire une assurance couvrant la Responsabilit&eacute; Civile et Accident de Travail du Stagiaire, durant les stages et trajets effectu&eacute;s.</p>
        <p>En cas d'accident de travail survenant durant la p&eacute;riode du stage, <strong>L&rsquo;ENTREPRISE</strong> s'engage &agrave; faire parvenir imm&eacute;diatement &agrave; l'Etablissement toutes les informations indispensables &agrave; la d&eacute;claration dudit accident.</p>
        
        <p><strong>Article 9: Evaluation de L&rsquo;ENTREPRISE</strong></p>
        <p>Le stage accompli, le parrain &eacute;tablira un rapport d'appr&eacute;ciations g&eacute;n&eacute;rales sur le travail effectu&eacute; et le comportement du Stagiaire durant son s&eacute;jour chez <strong>L&rsquo;ENTREPRISE</strong>.</p>
        <p><strong>L&rsquo;ENTREPRISE</strong> remettra au Stagiaire une attestation indiquant la nature et la dur&eacute;e des travaux effectu&eacute;s.</p>
        
        <p><strong>Article </strong><strong>10 : </strong><strong>Rapport de stage </strong></p>
        <p>A l'issue de chaque stage, le Stagiaire r&eacute;digera un rapport de stage faisant &eacute;tat de ses travaux et de son v&eacute;cu au sein de <strong>L&rsquo;ENTREPRISE</strong>. Ce rapport sera communiqu&eacute; &agrave; <strong>L&rsquo;ENTREPRISE</strong> et restera strictement confidentiel.</p>
        
        <p>Fait &agrave; T&eacute;touan en quatre exemplaires, le <strong>02-Jan-2024</strong></p>
        <table>
        <tbody>
        <tr>
        <td width="307">
        <table>
        <tbody>
        <tr>
        <td width="321">
        <table width="100%">
        <tbody>
        <tr>
        <td>
        <p><strong>{{$demande->Nom}}  {{$demande->Prenom}}</strong></p>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        <p>Nom et signature du Stagiaire</p>
        </td>
        <td width="307">
        <p>Le Coordonnateur de la fili&egrave;re</p>
        </td>
        </tr>
        <tr>
        <td width="307">
        <p>Signature et cach&eacute; de L&rsquo;Etablissement</p>
        <p><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('adminDash/images/signaturo.jpg'))) }}"></p>

        </td>
        <td width="307">
        <p>Signature et cach&eacute; de L&rsquo;ENTREPRISE</p>
        </td>
        </tr>
        </tbody>
        </table>
</body>
</html>
