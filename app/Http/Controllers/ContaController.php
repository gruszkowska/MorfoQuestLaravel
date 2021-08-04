<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Fabrica;
use App\Models\Pontuacao;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function conta() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        return view('conta.conta', ['menu' => $menu]);
    }

    public function resultadosConta() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        $pontuacoes = Pontuacao::orderBy('updated_at', 'desc')->get();

        foreach($pontuacoes as $pontuacao) {
            $pontuacao['categoria'] = Categoria::where('id', $pontuacao['categoria_id'])->first();
        }

        return view('conta.resultados', ['menu' => $menu, 'page' => 'resultadosConta', 'pontuacoes' => $pontuacoes]);
    }

    public function sugerirQuestoes() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        return view('conta.sugerir', ['menu' => $menu, 'page' => 'sugerirQuestoes']);
    }

    public function multipla() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        return view('conta.multipla', ['menu' => $menu, 'page' => 'sugerirQuestoes']);
    }

    public function multiplaForm(Request $request) {
        Fabrica::create([
            'pergunta' => $request['pergunta'],
            'resposta_a' => $request['resposta_a'],
            'resposta_b' => $request['resposta_b'],
            'resposta_c' => $request['resposta_c'],
            'resposta_d' => $request['resposta_d'],
            'correta' => $request['correta'],
            'categoria_id' =>$request['categoria_id']
        ]);

        return redirect()->route('sugerirQuestoes');
    }

    public function vouf() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        return view('conta.vouf', ['menu' => $menu, 'page' => 'sugerirQuestoes']);
    }

    public function voufForm(Request $request) {
        Fabrica::create([
            'pergunta' => $request['pergunta'],
            'resposta_a' => $request['resposta_a'],
            'resposta_b' => $request['resposta_b'],
            'correta' => $request['correta'],
            'categoria_id' =>$request['categoria_id']
        ]);

        return redirect()->route('sugerirQuestoes');
    }

    public function avaliarQuestoes() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        return view('conta.avaliar', ['menu' => $menu, 'page' => 'avaliarQuestoes']);
    }
}
