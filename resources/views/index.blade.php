<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Index</title>
  </head>
  <body>
  
  <div class="container">
<h2>Usuários Ativos</h2>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Nível</th>
            <th colspan='2'>Açoes</th>
        </tr>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->data_nascimento}}</td>
                <td>{{$usuario->nivel->nome}}</td>
                <td>
                    <form method="POST" action="{{url($usuario->id)}}">
                        @method('delete')
                        @csrf 
                        <button type="submit">Deletar</button>
                    </form>
                </td>
                <td>
                    <form method="get" action="{{url($usuario->id.'/edit')}}">
                        <button type="submit">Editar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>

    <h2>Usuários deletados</h2>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data Nascimento</th>
            <th>Nível</th>
            <th style='text-align:center;'>Açoes</th>
        </tr>
        @foreach($usuariosDeletados as $usuario)
            <tr>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->data_nascimento}}</td>
                <td>{{$usuario->nivel->nome}}</td>
                <td>
                    <form method="POST" action="{{url('/restore/'.$usuario->id)}}">
                        @method('put')
                        @csrf 
                        <button type="submit">Restaurar</button>
                    </form>
                </td>
                
            </tr>
        @endforeach
    </table>

<br>
<button><a href="/form">Adicionar Usuário</a></button>
<button><a href="/nivel/form">Adicionar Nível</a></button>

</div>
</body>
</html>