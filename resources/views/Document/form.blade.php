<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/send/mail" method="post">
    @csrf
        <p>L'email</p>
        <input type="text" name="email" id="">
        <p>Le Motif</p>
        <input type="text" name="Motif" id="">
        <input type="submit" value="GO!">
</form>
</body>
</html>