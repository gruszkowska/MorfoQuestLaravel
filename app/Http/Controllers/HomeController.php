<?php

namespace App\Http\Controllers;

use App\Mail\MsgContato;
use App\Models\Categoria;
use App\Models\Contato;
use App\Models\Pergunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Categoria::orderby('categoria', 'asc')->get();
        
        return view('index', ['menu' => $menu]);
    }

    public function sobre()
    {
        $perguntas = count(Pergunta::all());

        $categorias = Categoria::all();

        foreach($categorias as $categoria) {
            $categoria['perguntas'] =  count(Pergunta::where('categoria_id',  $categoria['id'])->get());
        }

        return view('sobre', ['categorias' => $categorias, 'perguntas' => $perguntas]);
    }

    public function contato()
    {
        return view('contato');
    }

    public function formcontato(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'assunto' => 'required',
            'mensagem' => 'required'
        ]);

        $contato = Contato::create($request->all());

        try {
            Mail::to('morfoquest@gmail.com')->send(new MsgContato($contato));
        } catch (\Throwable $th) {
            Log::error("errorMail" . $th->getMessage());
            return view('poscontato', ['error' => $th]);
        }
           
        return view('poscontato', ['error' => 'ok']);
    }
}
