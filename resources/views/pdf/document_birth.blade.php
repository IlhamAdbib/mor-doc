<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Acte de Résidence</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
        }
        h1 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 30px;
        }
        .header, .footer {
            text-align: center;
            margin-top: 20px;
        }
        .section {
            margin-bottom: 10px;
        }
        .section-title {
            font-weight: bold;
            display: inline-block;
            width: 500px;
        }
        .section-content {
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="bold">Royaume du Maroc</p>
        <p>Ministère de l'Intérieur</p>
    </div>

    <h1>Acte de Résidence</h1>

    <div>
        <div class="section">
            <span class="section-title">Numéro de l'extrait de naissance :</span>
            <span class="section-content">{{ $document->birth_extract_doc_num }}</span>
        </div>

        <div class="section">
            <span class="section-title">Numéro du document de naissance complet :</span>
            <span class="section-content">{{ $document->birth_complete_doc_num }}</span>
        </div>

        <div class="section">
            <span class="section-title">Prénom (en français) :</span>
            <span class="section-content">{{ $document->first_name_fr }}</span>
        </div>

        <div class="section">
            <span class="section-title">Nom (en français) :</span>
            <span class="section-content">{{ $document->last_name_fr }}</span>
        </div>

        <div class="section">
            <span class="section-title">Prénom de la mère :</span>
            <span class="section-content">{{ $document->mother_firstname }}</span>
        </div>

        <div class="section">
            <span class="section-title">Nom de la mère :</span>
            <span class="section-content">{{ $document->mother_lastname }}</span>
        </div>

        <div class="section">
            <span class="section-title">Prénom du père :</span>
            <span class="section-content">{{ $document->father_firstname }}</span>
        </div>

        <div class="section">
            <span class="section-title">Date de naissance :</span>
            <span class="section-content">{{ $document->day_birthdate }}/{{ $document->month_birthdate }}/{{ $document->year_birthdate }}</span>
        </div>

        <div class="section">
            <span class="section-title">Numéro du document :</span>
            <span class="section-content">{{ $document->doc_num }}</span>
        </div>
    </div>

    <div class="footer">
        <p class="bold">Fait le : {{ now() }}</p>
        <p>Signé : Le Responsable de l'Enregistrement</p>
    </div>
</body>
</html>
