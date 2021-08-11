@extends('layouts.app')

@section('content')

    <div id="body" class="h-full md:m-auto">
        <div class="container mx-5 mt-10">
            <div class="md:grid md:grid-cols-12 md:gap-8 pr-3 md:p-0">
                @component('_components.menu', ['menu' => $menu])

                @endcomponent

                <div class="mb-20 md:col-start-5 md:col-end-13 lg:col-start-4 lg:col-end-13">
                    <div
                        class="container flex flex-col p-5 border-2 border-dotted border-black dark:border-gray-300 h-full">
                        <div
                            class="container flex items-center content-center justify-center p-5 my-2 bg-gray-300 h-full pt-0">
                            <div class="w-full h-full">
                                <div class="col-span-2 p-2 flex flex-col place-items-center items-center h-full">
                                    <span
                                        class="text-4xl sm:text-6xl font-bold py-1 px-2 my-8 text-red-500 text-shadow border-b-2 border-black">
                                        @isset($_SESSION['categoria'])
                                            {{$_SESSION['categoria']}}
                                        @endisset
                                    </span>
                                    <div class="w-full">
                                        <form method="get" action="{{ route('resultado') }}">
                                            @foreach ($perguntas as $pergunta)
                                                <div
                                                    class="grid grid-cols-6 gap-8 p-2 my-12 border-double border-8 border-white">
                                                    <div class="col-span-6 text-lg pt-2">
                                                        <p class="text-center text-xl rounded-md p-2 text-red-500">
                                                            {{$pergunta->pergunta}}
                                                        </p>
                                                    </div>
                                                    <div class="col-span-6 mb-7">

                                                        <div class="question">
                                                            <ul
                                                                class="grid grid-cols-2 gap-y-4 gap-x-8 text-center px-2 md:px-4">
                                                                @foreach ($pergunta->respostas as $resposta)
                                                                <li class="resposta p-2 md:p-4 rounded-md">
                                                                    <label for="{{$resposta->id}}">
                                                                        <input class="input @if ($resposta->correta == 1) xxx @endif" type="radio" id="{{$resposta->id}}" name="{{$pergunta->id}}"
                                                                            value="{{$resposta->id}}" class="rounded-md" require>
                                                                        <span class="text-xs md:text-base break-words">
                                                                            {{$resposta->resposta}}
                                                                    </label><br>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach


                                            <div
                                                class="grid grid-cols-6 gap-8 p-2 flex-col place-items-center items-center">
                                                <div id="erro" class="col-span-6 text-lg">

                                                </div>
                                            </div>
                                            <div class="grid grid-cols-6 gap-8 px-5 py-5">
                                                <button type="button" id="respostas"
                                                    class="mt-4 w-4/5 text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl flex-col justify-self-center grid justify-items-center"><span
                                                        class="text-center">Respostas</span></button>
                                            </div>
                                            <div class="grid grid-cols-6 gap-8 px-5 py-5">
                                                <button type="submit" id="enviar"
                                                    class="mt-4 w-4/5 text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl flex-col justify-self-center grid justify-items-center"><span
                                                        class="text-center">Enviar</span></button>
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
