<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblLivrosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/livros',[TblLivrosController::class, 'index']);
Route::get('/livros/{codigo}',[TblLivrosController::class,'show']);
Route::post('/livros',[TblLivrosController::class,'store']);
Route::put('/livros/{codigo}',[TblLivrosController::class,'update']);
Route::delete('/livros/{id}',[TblLivrosController::class,'destroy']);
