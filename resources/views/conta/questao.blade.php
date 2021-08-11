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
                                        <form class="text-center flex flex-col justify-center items-center text-lg p-2"
                                            action="{{ route('questaoAvaliadaForm') }}" method="post">
                                            @csrf
                                            <input type="text" name="fabrica_id" value="{{ $questao->id }}" hidden>
                                            <input type="text" name="categoria_avaliacao" value="{{ $categoria_avaliacao }}" hidden>
                                            <p class="text-2xl text-red-500 my-3">
                                                {{ $questao->categoria }}
                                            </p>
                                            <br>
                                            <p class="my-3">
                                                {{ $questao->pergunta }}
                                            </p>
                                            @if ($questao->resposta_c != null)
                                                <div class="grid grid-cols-12 gap-2 my-2 w-3/4 items-center justify-center">
                                                <div class="col-span-6 p-3 rounded border-2 @if ($questao->correta == 'a') border-green-500 @else
                                                        border-black @endif">
                                                        <div>{{ $questao->resposta_a }}</div>
                                                    </div>
                                                <div class="col-span-6 p-3 rounded border-2 @if ($questao->correta == 'b') border-green-500 @else
                                                        border-black @endif">
                                                        <div>{{ $questao->resposta_b }}</div>
                                                    </div>
                                                <div class="col-span-6 p-3 rounded border-2 @if ($questao->correta == 'c') border-green-500 @else
                                                        border-black @endif">
                                                        <div>{{ $questao->resposta_c }}</div>
                                                    </div>
                                                <div class="col-span-6 p-3 rounded border-2 @if ($questao->correta == 'd') border-green-500 @else
                                                        border-black @endif">
                                                        <div>{{ $questao->resposta_d }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="grid grid-cols-12 gap-2 my-2 w-3/4 items-center justify-center">
                                                    <div class="col-span-6 p-3 rounded border-2 @if ($questao->correta == 'verdadeiro') border-green-500
                                                    @else border-black @endif">
                                                        <div>{{ $questao->resposta_a }}</div>
                                                    </div>
                                                <div class="col-span-6 p-3 rounded border-2 @if ($questao->correta == 'falso') border-green-500 @else
                                                        border-black @endif">
                                                        <div>{{ $questao->resposta_b }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <br><br>
                                            <div class="w-4/5">
                                                <div class="w-full grid grid-cols-12 items-center justify-center">
                                                    <div class="col-span-8 flex justify-self-start">A pergunta sugerida está corretamente categorizada?</div>
                                                    <div class="col-span-4 flex items-center justify-center">
                                                        <label class="p-2 flex items-center justify-center" for="categorizado">
                                                            <input class="h-4 w-4" type="radio" id="categorizado"
                                                                name="categorizacao" value="sim" class="rounded-md" require>
                                                            <div class="px-2">Sim</div>
                                                        </label>
                                                        <label class="p-2 flex items-center justify-center"
                                                            for="descategorizado">
                                                            <input class="h-4 w-4" type="radio" id="descategorizado"
                                                                name="categorizacao" value="nao" class="rounded-md" require>
                                                            <div class="px-2">Não</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="w-full grid grid-cols-12 items-center justify-center">
                                                    <div class="col-span-8 flex justify-self-start">A pergunta sugerida é
                                                        válida?</div>
                                                    <div class="col-span-4 flex items-center justify-center">
                                                        <label class="p-2 flex items-center justify-center" for="valida">
                                                            <input class="h-4 w-4" type="radio" id="valida" name="validade"
                                                                value="sim" class="rounded-md" require>
                                                            <div class="px-2">Sim</div>
                                                        </label>
                                                        <label class="p-2 flex items-center justify-center" for="invalida">
                                                            <input class="h-4 w-4" type="radio" id="invalida"
                                                                name="validade" value="nao" class="rounded-md" require>
                                                            <div class="px-2">Não</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="w-full grid grid-cols-12 items-center justify-center">
                                                    <div class="col-span-8 flex justify-self-start">A pergunta sugerida é de
                                                        relevância para o tema?</div>
                                                    <div class="col-span-4 flex items-center justify-center">
                                                        <label class="p-2 flex items-center justify-center" for="relevante">
                                                            <input class="h-4 w-4" type="radio" id="relevante"
                                                                name="relevancia" value="sim" class="rounded-md" require>
                                                            <div class="px-2">Sim</div>
                                                        </label>
                                                        <label class="p-2 flex items-center justify-center"
                                                            for="irrelevante">
                                                            <input class="h-4 w-4" type="radio" id="irrelevante"
                                                                name="relevancia" value="nao" class="rounded-md" require>
                                                            <div class="px-2">Não</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="w-full grid grid-cols-12 items-center justify-center">
                                                    <div class="col-span-8 flex justify-self-start">A resposta sugerida para
                                                        essa pergunta está correta?</div>
                                                    <div class="col-span-4 flex items-center justify-center">
                                                        <label class="p-2 flex items-center justify-center" for="certa">
                                                            <input class="h-4 w-4" type="radio" id="certa"
                                                                name="acertibilidade" value="sim" class="rounded-md"
                                                                require>
                                                            <div class="px-2">Sim</div>
                                                        </label>
                                                        <label class="p-2 flex items-center justify-center" for="errada">
                                                            <input class="h-4 w-4" type="radio" id="errada"
                                                                name="acertibilidade" value="nao" class="rounded-md"
                                                                require>
                                                            <div class="px-2">Não</div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit"
                                                class="mt-4 w-full text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl">Avaliar</button>
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
