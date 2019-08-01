<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Nivel</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>Nivel</th>
        </tr>
        @foreach($niveis as $nivel)
            <tr>
                <td>{{$nivel->nome}}</td>
            <tr>
        @endforeach
    </table>
</body>
</html>