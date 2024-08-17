<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\tbl_livros;

class TblLivrosController extends Controller
{   
    //Mostrar todos os registro
    //Crud -> Read(leitura) Select/aVisualizar
    public function index(){

        $regBook = tbl_livros::All();
        $contador = $regBook->count();

        return "Livros: ".$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Mostrar um tipo de registro especifico
    //Crud -> Read(leitura) Select/aVisualizar
    // A função show busca a id e retorna se o livro foram localizados
    public function show(string $id){ 
        $regBook = tbl_livros::find($id);

        if($regBook){
            return "Livros Localizados ".$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Livros não localizados: ".$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //cadastrar registros
    //Crud -> Create(Criar/cadastrar)
    public function store(Request $request){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            "nomeLivro"=>'required',
            "generoLivro"=>'required',
            "anoLivro"=>'required'
        ]);
        if ($regVerifq->fails()) {
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }

        $regBookCad = tbl_livros::create($regBook);

        if ($regBookCad) {
            return 'Livros Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }else {
            return 'Livros não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //alterar registros
    //Crud -> update(alterar)
    public function update(Request $request,string $id){
        $regBook = $request->All();

        $regVerifq = Validator::make($regBook,[
            "nomeLivro"=>'required',
            "generoLivro"=>'required',
            "anoLivro"=>'required'
        ]);

        if ($regVerifq->fails()) {
            return 'registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        
        $regBook = tbl_livros::Find($id);
        $regBookBanco->nomeLivro = $regBook['nomeLivro'];
        $regBookBanco->generoLivro = $regBook['generoLivro'];
        $regBookBanco->anoLivro = $regBook['anoLivro'];

        $retorno = $regBookBanco->save();

        if ($retorno) {
            return "livro atulizado com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        } else {
            return "Atenção... Erro: Livro não atualizado.".Response()->json([],Response::HTTP_NO_CONTENT);
        }
        

    }

    //deletar os registros
    //Crud -> delete(apagar)
    public function destroy(string $id){

        $regBook = tbl_livros::Find($id);

        if ($regBook->delete()) {
        return"O livro foi deletado com sucesso".Response()->json([],Response::HTTP_NO_CONTENT);
    }
        return "Algo deu errado: Livro não deletado".Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //crud
    // c reate
    // r ead
    // u pdate
    //d elete
}

