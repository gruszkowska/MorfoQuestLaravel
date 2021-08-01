<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pergunta;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Ponto;
use App\Models\Resposta;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function questoes(Request $request)
    {
        session_start();

        $validated = $request->validate([
            'number' => 'required|integer|between:5,15'
        ]);

        if(isset($request)){
            if(!isset($_SESSION['nome'])) {
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

            $acertos = array_sum($request->input());
            
            $questoes = $_SESSION['number'];

            $porcentagem = round(($acertos / $questoes) * 100, 2);

            $pontos = Ponto::create([
                'nome' => $_SESSION['nome'],
                'porcentagem' => $porcentagem
            ]);

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

    public function exportarStream() 
    {
        session_start();

        if(isset($_SESSION['questoes']) && $_SESSION['questoes'] != '') {
            $pdf = PDF::loadView('pdf', ['perguntas' => $_SESSION['questoes'], 'number' => $_SESSION['number']]);

            return $pdf->stream('morfoquestsemresposta.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }

    public function exportarResposta() 
    {
        session_start();

        if(isset($_SESSION['questoes']) && $_SESSION['questoes'] != '') {
            $pdf = PDF::loadView('pdfrespondido', ['perguntas' => $_SESSION['questoes'], 'number' => $_SESSION['number']]);

            return $pdf->stream('morfoquestcomresposta.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }
}
