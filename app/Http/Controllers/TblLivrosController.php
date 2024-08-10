<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\tb_livros;

class TblLivrosController extends Controller
{   
    //Mostrar todos os registro
    //Crud -> Read(leitura) Select/aVisualizar
    public function index(){

        $regBook = tb_livros::All();
        $contador = $regBook->count();

        return "Livros: ".$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/aVisualizar
    // A função show busca a id e retorna se o livro foram localizados
    public function show(string $id){ 
        $regBook = tb_livros::find($id);

        if($regBook){
            return "Livros Localizados ".$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Livros não localizados: ".Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //cadastrar registros
    //Crud -> Create(Criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVeri = Validator::make($regBook,[
            "nomeLivro"=>'required',
            "generoLivro"=>'required',
            "anoLivro"=>'required'
        ]);
    }

    //alterar registros
    //Crud -> update(alterar)
    public function update(){

    }

    //deletar os registros
    //Crud -> delete(apagar)
    public function destroy(){

    }

    //crud
    // c reate
    // r ead
    // u pdate
    //d elete
}

