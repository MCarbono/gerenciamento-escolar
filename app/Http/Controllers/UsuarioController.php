<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Nivel, Usuario, Materia};
use App\Http\Requests\{UsuarioStoreRequest};
use DB;

class UsuarioController extends Controller
{
    public function index() {

        $usuarios = Usuario::all();
        $usuariosDeletados = Usuario::onlyTrashed()->get();

        return view('index', compact('usuarios', 'usuariosDeletados'));
    }

    public function create() {

        $niveis = Nivel::all();
        $materias = Materia::all();
        return view('form', compact('niveis', 'materias'));
    }

    public function store(UsuarioStoreRequest $request) {
        
        /*$usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'nivel_id' => $request->nivel_id
        ]);*/

        DB::beginTransaction();    
        try {
            $usuario = Usuario::create($request->all());
            $usuario->materias()->sync($request->materias);

               /* Usa-se esse metodo com o pivo, nesse caso carga_horaria
                $usuario->materiais()->sync(){
                    [
                        1 => ['carga_horaria' => 20],
                        2 => ['carga_horaria' => 25]
                    ]
                }
            */ 

            DB::commit();    
            return back()->with('success', 'Usuario cadastrado com sucesso');

         

        } catch(Exception $e){
            DB::rollback();
            return back()->with('error', 'Erro no servidor');
        }
        
        
    }

    public function soma($a, $b) {
        return 'Soma: '.($a + $b);
    }

    public function edit($id){
        $usuario = Usuario::findOrFail($id);
        $niveis = Nivel::all();
        return view('/form', compact('usuario', 'niveis'));
    }

    public function update(UsuarioStoreRequest $request, $id){
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return redirect('/');
    }

    public function destroy($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return back();
    }

    public function restore($id){
        $usuario = Usuario::onlyTrashed()->findOrFail($id);
        $usuario->restore();
        return back();
    }
    
}
