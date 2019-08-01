<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form method="POST" action="{{url((isset($usuario) ? $usuario->id : ''))}}">

        @csrf

        @if(isset($usuario))
            @method('PUT')
        @endif
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{isset($usuario) ? $usuario->nome : ''}}"><br>

        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="{{isset($usuario) ? $usuario->email : ''}}"><br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="text" name="data_nascimento" id="data_nascimento" value="{{isset($usuario) ? $usuario->data_nascimento: ''}}"><br>

        <select name="nivel_id">
            @foreach($niveis as $nivel)
                <option {{isset($usuario) && $usuario->nivel->id == $nivel->id ? 'selected' : ''}} value="{{$nivel->id}}">{{$nivel->nome}}</option>
            @endforeach
        </select>
        <br>


        <input type="submit" value="Enviar">
    </form>
</body>
</html>