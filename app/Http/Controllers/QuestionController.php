<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pergunta;
use App\Models\Ponto;
use App\Models\Pontuacao;
use App\Models\Questionario;
use App\Models\Quiz;
use App\Models\Resposta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function questoes(Request $request)
    {
        session_start();

        $validated = $request->validate([
            'number' => 'required|integer|between:5,15'
        ]);

        if(isset($request)){
            if(Auth::user() != '') {
                $_SESSION['nome'] = Auth::user()->name;
            }

            elseif(Auth::user() == '' && !isset($_SESSION['nome'])) {
                $_SESSION['nome'] = $request->nome;
    
                $nome = User::create([
                    'name' => $request->nome
                ]);
    
                $nome->save();
            }
    
            $categorias = Categoria::where('id', $request->categoria)->get();
            foreach ($categorias as $item) {
                $categoria = $item;
            }
    
            $_SESSION['categoria'] = $categoria->categoria;
    
            $_SESSION['number'] = $request->number;
    
            if(!isset($_SESSION['questoes']) || $_SESSION['questoes'] == '') {
                if($request->categoria == 9) {
                    $perguntas = Pergunta::inRandomOrder()->limit($request->number)->get();
                }
                else{
                    $perguntas = Pergunta::where('categoria_id', $categoria->id)->inRandomOrder()->limit($request->number)->get();
                }
    
                foreach($perguntas as $pergunta) {
                    $pergunta['respostas'] =  Resposta::where('pergunta_id',  $pergunta['id'])->get();
                }
                
                $_SESSION['questoes'] = $perguntas;

                if (Auth::check()) {
                    $quiz = Quiz::create([
                        'user_id' => Auth::user()->id
                    ]);

                    $_SESSION['quiz'] = $quiz;
                }
            } 
    
            $menu = Categoria::orderby('categoria', 'asc')->get();
    
            return view('questoes', ['menu' => $menu, 'perguntas' => $_SESSION['questoes']]);
        }

        else {
            return redirect()->route('home');
        }
        
    }

    public function resultado(Request $request, Categoria $categoria)
    {
        session_start();

        if(isset($_SESSION['questoes']) && $_SESSION['questoes'] != '') {

            $menu = Categoria::orderby('categoria', 'asc')->get();

            $categoria = Categoria::select('id')->where('categoria', $_SESSION['categoria'])->first();
                
            $count_respostas = [];
            $count_gabarito = [];
            
            foreach ($_SESSION['questoes'] as &$questao) {
                $id = $questao->id;
                $questao['marcada'] = $request->$id;
            }

            foreach ($_SESSION['questoes'] as &$pergunta) {
                if (Auth::check()) {
                    Questionario::create([
                        'user_id' => Auth::user()->id,
                        'quiz_id' => $_SESSION['quiz']->id,
                        'categoria_id' => $categoria->id,
                        'pergunta_id' => $pergunta->id,
                        'marcada' => $pergunta['marcada']
                    ]);
                }

                $count_respostas[] = $pergunta['marcada'];

                foreach ($pergunta['respostas'] as &$resposta) {
                    if ($resposta['correta'] == 1) {
                        $count_gabarito[] = $resposta['id'];
                    }   
                }
            }

            $acertos = count(array_intersect($count_respostas, $count_gabarito));
            
            $questoes = $_SESSION['number'];

            $porcentagem = round(($acertos / $questoes) * 100, 2);

            $pontos = Ponto::create([
                'nome' => $_SESSION['nome'],
                'porcentagem' => $porcentagem
            ]);

            if(Auth::user() != '') {
                $pontuacao = Pontuacao::create([
                    'user_id' => Auth::user()->id,
                    'porcentagem' => $porcentagem,
                    'categoria_id' => $categoria['id'],
                    'quiz_id' => $_SESSION['quiz']['id']
                ]);
            }

            return view('resultado', ['menu' => $menu, 'acertos' => $acertos, 'questoes' => $questoes, 'porcentagem' => $porcentagem]);
        }

        else {
            return redirect()->route('home');
        }
    }

    public function final() 
    {
        session_start();

        if(isset($_SESSION['questoes']) && $_SESSION['questoes'] != '') {
            $_SESSION['questoes'] = '';
            $_SESSION['quiz'] = '';

            $categorias = Categoria::where('categoria', $_SESSION['categoria'])->get();
            foreach ($categorias as $item) {
                $categoria = $item;
            }

            return redirect()->route('categorias.show', ['categoria' => $categoria]);
        }

        else {
            return redirect()->route('home');
        }
    }

    public function sair() 
    {
        session_start();

        session_destroy();

        return redirect()->route('home');
    }
}
