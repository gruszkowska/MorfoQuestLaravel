<?php

use App\Http\Controllers\CategoriaController; 
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\RespostaController;
use App\Mail\MsgContato;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sobre', [\App\Http\Controllers\HomeController::class, 'sobre'])->name('sobre');
Route::get('/contato', [\App\Http\Controllers\HomeController::class, 'contato'])->name('contato');
Route::post('/formcontato', [\App\Http\Controllers\HomeController::class, 'formcontato'])->name('formcontato');

Route::resource('perguntas', PerguntaController::class);
Route::resource('respostas', RespostaController::class);
Route::resource('categorias', CategoriaController::class);
Route::post('questoes', [\App\Http\Controllers\QuestionController::class, 'questoes'])->name('questoes');
Route::get('resultado', [\App\Http\Controllers\QuestionController::class, 'resultado'])->name('resultado');
Route::get('final', [\App\Http\Controllers\QuestionController::class, 'final'])->name('final');
Route::get('sair', [\App\Http\Controllers\QuestionController::class, 'sair'])->name('sair');

Route::get('msgcontato', function () {
    Mail::to('morfoquest@gmail.com')->send(new MsgContato());
    return 'email';
})->name('msgcontato');

Route::get('exportarStream', [\App\Http\Controllers\PDFController::class, 'exportarStream'])->name('pdfStream');
Route::get('exportarStreamGabarito', [\App\Http\Controllers\PDFController::class, 'exportarStreamGabarito'])->name('pdfStreamGabarito');
Route::get('exportarPDF/{quiz_id}', [\App\Http\Controllers\PDFController::class, 'exportarPDF'])->name('pdf');
Route::get('exportarGabarito/{quiz_id}', [\App\Http\Controllers\PDFController::class, 'exportarGabarito'])->name('pdfGabarito');
Route::get('exportarRespostas/{quiz_id}', [\App\Http\Controllers\PDFController::class, 'exportarRespostas'])->name('pdfRespostas');
Route::get('exportarRespostasGabarito/{quiz_id}', [\App\Http\Controllers\PDFController::class, 'exportarRespostasGabarito'])->name('pdfRespostasGabarito');

Auth::routes(['verify' => false]);

Route::get('conta', [\App\Http\Controllers\ContaController::class, 'conta'])->name('conta');
Route::get('conta/resultadosConta', [\App\Http\Controllers\ContaController::class, 'resultadosConta'])->name('resultadosConta');
Route::post('conta/resultadosContaDetalhes', [\App\Http\Controllers\ContaController::class, 'resultadosContaDetalhes'])->name('resultadosContaDetalhes');
Route::get('conta/sugerirQuestoes', [\App\Http\Controllers\ContaController::class, 'sugerirQuestoes'])->name('sugerirQuestoes');
Route::get('conta/sugerirQuestoes/multipla', [\App\Http\Controllers\ContaController::class, 'multipla'])->name('multipla');
Route::post('conta/sugerirQuestoes/multiplaForm', [\App\Http\Controllers\ContaController::class, 'multiplaForm'])->name('multiplaForm');
Route::get('conta/sugerirQuestoes/vouf', [\App\Http\Controllers\ContaController::class, 'vouf'])->name('vouf');
Route::post('conta/sugerirQuestoes/voufForm', [\App\Http\Controllers\ContaController::class, 'voufForm'])->name('voufForm');
Route::get('conta/avaliarQuestoes', [\App\Http\Controllers\ContaController::class, 'avaliarQuestoes'])->name('avaliarQuestoes');
Route::post('conta/avaliarQuestoes/questaoAvaliada', [\App\Http\Controllers\ContaController::class, 'questaoAvaliada'])->name('questaoAvaliada');
Route::post('conta/avaliarQuestoes/questaoAvaliadaForm', [\App\Http\Controllers\ContaController::class, 'questaoAvaliadaForm'])->name('questaoAvaliadaForm');