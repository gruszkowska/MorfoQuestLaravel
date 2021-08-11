<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pergunta;
use App\Models\Pontuacao;
use App\Models\Questionario;
use App\Models\Resposta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function exportarStream() 
    {
        session_start();

        if(isset($_SESSION['questoes']) && $_SESSION['questoes'] != '') {
            $pdf = PDF::loadView('stream', ['perguntas' => $_SESSION['questoes'], 'number' => $_SESSION['number']]);

            return $pdf->stream('morfoquestsemgabarito.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }

    public function exportarStreamGabarito() 
    {
        session_start();

        if(isset($_SESSION['questoes']) && $_SESSION['questoes'] != '') {
            $pdf = PDF::loadView('streamGabarito', ['perguntas' => $_SESSION['questoes'], 'number' => $_SESSION['number']]);

            return $pdf->stream('morfoquestcomgabarito.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }

    public function exportarPDF($quiz_id) 
    {
        if (Auth::check()) {
            $pontuacao = Pontuacao::where('quiz_id', $quiz_id)->first();
            $questionario = Questionario::where('quiz_id', $quiz_id)->get();
            $categoria = Categoria::where('id', $pontuacao->categoria_id)->first();
            foreach ($questionario as &$quest) {
                $perguntas[] = Pergunta::where('id', $quest->pergunta_id)->get();
                foreach($perguntas as &$perg) {
                    
                }
                foreach($perg as &$p) {
                    $respostas[] = Resposta::where('pergunta_id',  $p->id)->get();
                }
                
            }

            $pdf = PDF::loadView('pdf', ['categoria' => $categoria, 'pontuacao' => $pontuacao, 'questionario' => $questionario, 'perguntas' => $perguntas, 'respostas' => $respostas]);

            return $pdf->stream('morfoquest.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }

    public function exportarGabarito($quiz_id) 
    {
        if (Auth::check()) {
            $pontuacao = Pontuacao::where('quiz_id', $quiz_id)->first();
            $questionario = Questionario::where('quiz_id', $quiz_id)->get();
            $categoria = Categoria::where('id', $pontuacao->categoria_id)->first();
            foreach ($questionario as &$quest) {
                $perguntas[] = Pergunta::where('id', $quest->pergunta_id)->get();
                foreach($perguntas as &$perg) {
                    
                }
                foreach($perg as &$p) {
                    $respostas[] = Resposta::where('pergunta_id',  $p->id)->get();
                }
                
            }

            $pdf = PDF::loadView('pdfGabarito', ['categoria' => $categoria, 'pontuacao' => $pontuacao, 'questionario' => $questionario, 'perguntas' => $perguntas, 'respostas' => $respostas]);

            return $pdf->stream('morfoquest.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }

    public function exportarRespostas($quiz_id) 
    {
        if (Auth::check()) {
            $pontuacao = Pontuacao::where('quiz_id', $quiz_id)->first();
            $questionario = Questionario::where('quiz_id', $quiz_id)->get();
            $categoria = Categoria::where('id', $pontuacao->categoria_id)->first();
            foreach ($questionario as &$quest) {
                $perguntas[] = Pergunta::where('id', $quest->pergunta_id)->get();
                foreach($perguntas as &$perg) {
                    
                }
                foreach($perg as &$p) {
                    $respostas[] = Resposta::where('pergunta_id',  $p->id)->get();
                }
                
            }

            $pdf = PDF::loadView('pdfRespostas', ['categoria' => $categoria, 'pontuacao' => $pontuacao, 'questionario' => $questionario, 'perguntas' => $perguntas, 'respostas' => $respostas]);

            return $pdf->stream('morfoquest.pdf');
        }

        else {
            return redirect()->route('home');
        }
    }
}
