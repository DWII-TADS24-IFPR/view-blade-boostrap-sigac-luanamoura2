<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
        <h1>Pessoas:</h1>
        @foreach ($pessoas as $pessoa)
        <div>
            <h2>{{$pessoa->nome}}</h2>
            <p>Idade: {{$pessoa->idade}}</p>
            <p>CPF: {{$pessoa->cpf}}</p>
        </div>
        @endforeach
    </div>
</body>

</html>