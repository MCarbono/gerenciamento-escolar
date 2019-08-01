<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário Nivel</title>
</head>
<body>
    <form method="POST" action="{{url( isset($nivel) ? '/nivel/' . $nivel->id : '/nivel/')}}" >
    
        @csrf

        @if(isset($nivel))
            @method('PUT')
        @endif



        <label for="text">Nivel: <label>
        <input type="text" value="{{isset($nivel) ? $nivel->nome : '' }}" name="nome"/>
        <input type="submit"  name="enviar" />
    </form>
</body>
</html>