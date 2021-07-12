<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pergunta $pergunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pergunta $pergunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pergunta $pergunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pergunta  $pergunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pergunta $pergunta)
    {
        //
    }

    public function categoria($categoria)
    {
        Categoria::all();

        return $categoria;
    }
}
