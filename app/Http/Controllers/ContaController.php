<?php

namespace App\Http\Controllers;

use App\Models\Avaliar;
use App\Models\Categoria;
use App\Models\Fabrica;
use App\Models\Pergunta;
use App\Models\Pontuacao;
use App\Models\Questionario;
use App\Models\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContaController extends Controller
{
    public function conta() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        return view('conta.conta', ['menu' => $menu]);
    }

    public function resultadosConta() {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        $pontuacoes = Pontuacao::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);

        foreach($pontuacoes as $pontuacao) {
            $pontuacao['categoria'] = Categoria::where('id', $pontuacao['categoria_id'])->first();
        }

        return view('conta.resultados', ['menu' => $menu, 'page' => 'resultadosConta', 'pontuacoes' => $pontuacoes]);
    }

    public function resultadosContaDetalhes(Request $request) {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        $pontuacao = Pontuacao::where('quiz_id', $request['quiz_id'])->first();
        $questionario = Questionario::where('quiz_id', $request['quiz_id'])->get();
        $categoria = Categoria::where('id', $pontuacao->categoria_id)->first();
        foreach ($questionario as &$quest) {
            $perguntas[] = Pergunta::where('id', $quest->pergunta_id)->get();
            foreach($perguntas as &$perg) {
                
            }
            foreach($perg as &$p) {
                $respostas[] = Resposta::where('pergunta_id',  $p->id)->get();
            }
            
        }

        return view('conta.resultadosDetalhes', ['menu' => $menu, 'page' => 'resultadosConta', 'categoria' => $categoria, 'pontuacao' => $pontuacao, 'questionario' => $questionario, 'perguntas' => $perguntas, 'respostas' => $respostas]);
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

    public function questaoAvaliada(Request $request) {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        $categoria_avaliacao = Categoria::where('id', $request['categoria_id'])->first();

        if($request['categoria_id'] == 9) {
            $questao = Fabrica::whereNotIn('id', function($query) {
                $query->select('fabrica_id')->from('avaliar')->where('user_id', Auth::user()->id);
            })->first();
        }

        elseif($request['categoria_id'] != 9) {
            $questao = Fabrica::where('categoria_id', $request['categoria_id'])->whereNotIn('id', function($query) {
                $query->select('fabrica_id')->from('avaliar')->where('user_id', Auth::user()->id);
            })->first();
        }
        
        if (!isset($questao) || $questao == null) {
            if($request['categoria_id'] == 9) {
                return view('conta.semquestao', ['menu' => $menu, 'page' => 'avaliarQuestoes', 'nula' => 'todas']);
            }
            
            elseif($request['categoria_id'] != 9) {
                return view('conta.semquestao', ['menu' => $menu, 'page' => 'avaliarQuestoes', 'nula' => 'categoria']);
            }
        }

        else {
            $categoria = Categoria::where('id', $questao->categoria_id)->first();

            $questao['categoria'] = $categoria['categoria'];

            return view('conta.questao', ['menu' => $menu, 'page' => 'avaliarQuestoes', 'questao' => $questao, 'categoria_avaliacao' => $categoria_avaliacao['id']]);
        }
    }

    public function questaoAvaliadaForm(Request $request) {
        $menu = Categoria::orderby('categoria', 'asc')->get();

        Avaliar::create([
            'user_id' => Auth::user()->id,
            'fabrica_id' => $request['fabrica_id'],
            'categorizacao' =>$request['categorizacao'],
            'validade' => $request['validade'],
            'relevancia' => $request['relevancia'],
            'acertibilidade' => $request['acertibilidade']
        ]);

        $categoria_avaliacao = $request['categoria_avaliacao'];

        return view('conta.avaliada', ['menu' => $menu, 'page' => 'avaliarQuestoes', 'categoria_avaliacao' => $categoria_avaliacao]);
    }
}
