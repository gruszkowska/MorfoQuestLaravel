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
                                        <div class="text-center flex flex-col justify-center items-center p-2">
                                            <div
                                                class="flex flex-col gap-2 text-2xl justify-center items-center my-3 w-full">
                                                <div class="flex justify-between w-1/2">
                                                    <div>Categoria:</div>
                                                    <div class="text-red-500">{{ $categoria->categoria }}</div>
                                                </div>
                                                <div class="flex justify-between w-1/2">
                                                    <div>Data:</div>
                                                    <div class="text-red-500">
                                                        {{ date('d/m/y H:i', strtotime($pontuacao->updated_at)) }}</div>
                                                </div>
                                                <div class="flex justify-between w-1/2">
                                                    <div>Pontuação:</div>
                                                    <div class="text-red-500">{{ $pontuacao->porcentagem }} %</div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <p class="text-xl">
                                                Questionário
                                            </p>
                                            <br><br>
                                            <div>
                                                @foreach ($perguntas as $pergunta)
                                                    @foreach ($pergunta as $p)
                                                        <ul class="list-decimal flex flex-col gap-6 justify-center items-center w-full">
                                                            <li class="text-lg">
                                                                {{ $p->pergunta }}
                                                                <br>
                                                            </li>
                                                            <ul
                                                                class="list-alpha grid grid-cols-12 gap-4 justify-center items-center w-full mb-20">
                                                                @foreach ($respostas as $resposta)
                                                                    @foreach ($resposta as $r)
                                                                        @if ($r->pergunta_id == $p->id)
                                                                            @foreach ($questionario as $quest)
                                                                                @if ($quest->pergunta_id == $p->id && $r->correta == 1 && $quest->marcada == $r->id)
                                                                                    <li class="col-span-6 text-green-500">
                                                                                        <i
                                                                                            class="text-sm fas fa-check text-green-500"></i>
                                                                                        {{ $r->resposta }}
                                                                                    </li>
                                                                                @elseif ($quest->pergunta_id == $p->id
                                                                                    && $r->correta == 1)
                                                                                    <li class="col-span-6">
                                                                                        <i
                                                                                            class="text-sm fas fa-check text-green-500"></i>
                                                                                        {{ $r->resposta }}
                                                                                    </li>
                                                                                @elseif ($quest->pergunta_id == $p->id
                                                                                    && $quest->marcada == $r->id)
                                                                                    <li class="col-span-6 text-red-500">
                                                                                        <i
                                                                                            class="text-sm fas fa-times text-red-500"></i>
                                                                                        {{ $r->resposta }}
                                                                                    </li>
                                                                                @elseif($quest->pergunta_id == $p->id)
                                                                                    <li class="col-span-6">
                                                                                        {{ $r->resposta }}
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </ul>
                                                        </ul>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div class="flex flex-row justify-between gap-8 px-5 py-5 mt-5 w-3/4">
                                                <a href="{{ route('pdf', ['quiz_id' => $pontuacao->quiz_id]) }}"
                                                    target="_blank"><i class="far fa-file-pdf"> PDF simples</i></a>

                                                <a href="{{ route('pdfGabarito', ['quiz_id' => $pontuacao->quiz_id]) }}"
                                                    target="_blank"><i class="far fa-file-pdf"> PDF com gabarito</i></a>

                                                <a href="{{ route('pdfRespostas', ['quiz_id' => $pontuacao->quiz_id]) }}"
                                                    target="_blank"><i class="far fa-file-pdf"> PDF com respostas</i></a>
                                            </div>
                                        </div>
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
