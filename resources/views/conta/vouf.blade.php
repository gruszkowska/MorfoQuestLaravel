@extends('layouts.app')

@section('content')

    <div id="body" class="h-full md:m-auto">
        <div class="container mx-5 mt-10">
            <div class="md:grid md:grid-cols-12 md:gap-8 pr-3 md:p-0">
                @component('_components.menu', ['menu' => $menu])

                @endcomponent
                <div class="mb-20 md:col-start-5 md:col-end-13 lg:col-start-4 lg:col-end-13">
                    <div
                        class="container flex items-center content-center justify-center p-5 border-2 border-dotted border-black dark:border-gray-300 h-full">
                        <div class="container flex content-center justify-center p-5 bg-gray-300 h-full">
                            <div class="w-full h-full">
                                <div class="h-full col-span-6 p-2 my-auto flex flex-col place-items-center items-center">
                                    <div class="w-full">
                                        @component('_components.menu_conta', ['page' => $page])

                                        @endcomponent
                                        <br><br>
                                        <form class="w-full" action="{{ route('voufForm') }}" method="post">
                                            @csrf
                                            <div class="w-4/5 mx-auto">
                                                <p class="text-xl text-center my-2">
                                                    Verdadeira ou Falsa
                                                </p>
                                                <div class="col-span-6">
                                                    <label class="p-2 flex justify-between items-center" for="categoria_id">
                                                        <div>Verdadeira ou Falsa?</div>
                                                        <select class="w-1/2 justify-self-end rounded p-2" name="categoria_id"
                                                            id="categoria_id" required>
                                                            <option value="" disabled selected>Selecione uma categoria</option>
                                                            @foreach ($menu as $categoria)
                                                            @if($categoria->id != 9)
                                                            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                                <div class="col-span-6">
                                                    <label class="p-1" for="pergunta">Afirmação
                                                        <textarea class="w-full focus:border-black rounded-md p-2 my-2"
                                                            type="mensage" name="pergunta" id="pergunta" rows="4"
                                                            required></textarea>
                                                    </label>
                                                </div>
                                                <div class="col-span-6">
                                                    <textarea class="w-full focus:border-black rounded-md p-2 my-2"
                                                            type="mensage" name="resposta_a" id="resposta_a" rows="3"
                                                            required hidden>Verdadeiro</textarea>
                                                </div>
                                                <div class="col-span-6">
                                                    <textarea class="w-full focus:border-black rounded-md p-2 my-2"
                                                            type="mensage" name="resposta_b" id="resposta_b" rows="3"
                                                            required hidden>Falso</textarea>
                                                </div>
                                                <div class="col-span-6">
                                                    <label class="p-2 flex justify-between items-center" for="correta">
                                                        <div>Verdadeira ou Falsa?</div>
                                                        <select class="w-1/2 justify-self-end rounded p-2" name="correta"
                                                            id="correta" required>
                                                            <option value="" disabled selected>Selecione uma alternativa</option>
                                                            <option value="verdadeiro">Verdadeira</option>
                                                            <option value="falso">Falsa</option>
                                                        </select>
                                                    </label>
                                                </div>
                                                <button type="submit"
                                                    class="mt-4 w-full text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl">Iniciar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
