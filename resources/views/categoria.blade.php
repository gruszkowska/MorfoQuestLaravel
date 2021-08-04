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
                                <form method="post" action="{{ route('questoes') }}"
                                    class="col-span-2 p-2 my-auto flex flex-col place-items-center items-center">
                                    <input type="text" name="categoria" value="{{$categoria->id}}" hidden>
                                    @csrf
                                    <span
                                        class="text-4xl sm:text-6xl font-bold py-1 px-2 mb-20 text-red-500 text-shadow border-b-2 border-black">
                                        @isset($_SESSION['categoria'])
                                            {{ $categoria->categoria }}
                                        @else
                                            Categoria
                                        @endisset
                                    </span>
                                    <p class="text-center text-2xl">
                                        E ai
                                        <span class="text-red-500">
                                            @isset($_SESSION['nome'])
                                                {{ $_SESSION['nome'] }}
                                            @endisset
                                        </span>
                                        ? Vamos começar?
                                    </p>

                                    @if(Auth::user() == '' && isset($_SESSION['nome']))
                                        <a class="p-2 hover:text-red-500 text-sm hover:underline" href="{{ route('sair') }}">Não é você?</a>
                                    @endif

                                    <br>
                                    @if (!isset($_SESSION['nome']))
                                        <p class="text-center text-2xl">
                                            Digite seu nome e clique em Iniciar
                                        </p>
                                        <br>
                                        <input class="rounded-md focus:ring-black p-2 w-max" type="name" name="nome"
                                            placeholder="Insira seu nome:" required>
                                    @endif

                                    <br>

                                    @isset($_SESSION['categoria'])
                                        <div class="mb-5">
                                            <label for="number">
                                                <span class="text-xl">Quantas perguntas?</span>
                                                <select name="number" id="number" require>
                                                    @for($i = 5; $i <= 15; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </label>
                                        </div>

                                        <button type="submit"
                                            class="mt-4 w-4/5 text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl">Iniciar</button>

                                    @endisset

                                    @if (!isset($_SESSION['categoria']))
                                        <p class="text-center text-2xl">
                                            Escolha uma categoria para começar!
                                        </p>
                                    @endif


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
