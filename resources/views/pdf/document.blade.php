<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Acte de Décès</title>
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
    </style>
</head>
<body>
    <h1>Acte de Décès</h1>
    <div class="header">
        <p class="bold">Royaume du Maroc</p>
        <p>Ministère de l'Intérieur</p>
        <p>Commune : {{ $document->commune_id }}</p>
        <p>Date : {{ $document->death_date }}</p>
    </div>

    <div>
        <p class="section-title">Numéro du Document : {{ $document->id }}</p>

        <p class="section-title">Commune d'Enregistrement : {{ $document->commune_id }}</p>

        <p class="section-title">Cause du Décès : {{ $document->death_cause }}</p>

        <p class="section-title">Numéro du Document d'État Civil : {{ $document->document_number }}</p>

        <p class="section-title">Année d'Inscription : {{ $document->inscription_year }}</p>

        <p class="section-title">Numéro du Livre de Famille : {{ $document->family_book_number }}</p>

        <p class="section-title">Lieu de Délivrance : {{ $document->address_line1 }}, {{ $document->address_line2 }}, {{ $document->locality }}, {{ $document->delivery_location }} </p>

    </div>

    <div class="footer">
        <p class="bold">Fait à {{ $document->city_id }}, le {{ $document->death_date }}</p>
        <p>Signé : Le Responsable de l'Enregistrement</p>
    </div>
</body>
</html>
