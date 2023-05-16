<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/{id?}',[ProdutoController::class, 'show'])->name('produto.show');

Route::get('/empresa', function () {
    return view('site1/empresa');
});

Route::any('/any', function () {
    return "PERMITE TODO TIPO DE ACESSO HTTP";
});

Route::match(['put', 'delete'], '/match', function () {
    return "PERMITE APENAS ACESSOS DEFINIDOS";
});

Route::get('/produto/{id}/{cat}', function ($id, $cat) {
    return "o id do produto é:".$id."<br>"."A categoria é:".$cat;
});

Route::redirect('/sobre', '/empresa');
Route::view('/empresa', 'site1/empresa');

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});