<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: left;
            direction: ltr;
        }
        h1 {
            color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        table th {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Détails du document</h1>
    <table>
        <tr>
            <th>Numéro du document</th>
            <td>{{ $document->id }}</td>
        </tr>
        <tr>
            <th>Statut</th>
            <td>{{ $document->statut == 'En cours' ? 'En cours de traitement' : 'Traité' }}</td>
        </tr>
        <tr>
            <th>Détails</th>
            <td>{{ $document->details ?? 'Aucun détail supplémentaire' }}</td>
        </tr>
    </table>
</body>
</html>
