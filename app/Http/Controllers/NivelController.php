<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Nivel, Usuario};

class NivelController extends Controller {
    


        public function index() {

            $niveis = Nivel::all();
    
            return view('indexNivel', compact('niveis'));
        }
    
        public function create() {
    
            return view('formNivel');
        }
    
        public function store(Request $request) {
            
           /*$nivel = Nivel::create([
               'nome' => $request->get('nome')
           ]);*/
           $nivel = Nivel::create($request->all());
    
            return redirect('/nivel');
    
        }

        public function edit($id){
           
            $nivel = Nivel::findOrFail($id);
            return view('formNivel', compact('nivel'));
        }
    
        public function update(Request $request, $id){
            $nivel = Nivel::findOrFail($id);
            $nivel->update($request->all());
            return redirect('/nivel');
        }
    
    
}
