<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>Un utente ha richiesto di lavorare con noi </h1>
        <h3>Ecco i suoi dati</h3>
        <p>Nome: {{$name}}</p>
        <p>Email: {{$email}}</p>
        <p>Messaggio: {{$body}}</p>
        <h5>Se vuoi renderlo revisore clicca qui</h5>
        <a href="{{route('make.revisor',$email)}}">Rendi revisore</a>
    </div>
</body> 
</html>