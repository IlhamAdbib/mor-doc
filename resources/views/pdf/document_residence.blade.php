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
            width: 300px;
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
            <span class="section-title">Identifiant du document :</span>
            <span class="section-content">{{ $document->id }}</span>
        </div>
        <div class="section">
            <span class="section-title">Prénom :</span>
            <span class="section-content">{{ $document->firstname }}</span>
        </div>
        <div class="section">
            <span class="section-title">Nom de famille :</span>
            <span class="section-content">{{ $document->lastname }}</span>
        </div>
        <div class="section">
            <span class="section-title">Numéro de CIN :</span>
            <span class="section-content">{{ $document->cin }}</span>
        </div>
        <div class="section">
            <span class="section-title">Date de naissance :</span>
            <span class="section-content">{{ $document->birthdate }}</span>
        </div>
        <div class="section">
            <span class="section-title">Lieu de naissance :</span>
            <span class="section-content">{{ $document->birthplace }}</span>
        </div>
        <div class="section">
            <span class="section-title">Profession :</span>
            <span class="section-content">{{ $document->profession }}</span>
        </div>
        <div class="section">
            <span class="section-title">Type de résidence :</span>
            <span class="section-content">{{ $document->residence_type }}</span>
        </div>
        <div class="section">
            <span class="section-title">Adresse complète :</span>
            <span class="section-content">{{ $document->full_address }}</span>
        </div>
        <div class="section">
            <span class="section-title">Code postal :</span>
            <span class="section-content">{{ $document->postal_code }}</span>
        </div>
        <div class="section">
            <span class="section-title">Ville :</span>
            <span class="section-content">{{ $document->city }}</span>
        </div>
    </div>

    <div class="footer">
        <p class="bold">Fait le : {{ now() }}</p>
        <p>Signé : Le Responsable de l'Enregistrement</p>
    </div>
</body>
</html>
