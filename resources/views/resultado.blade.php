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
                        <div class="container flex items-center content-center justify-center p-5 bg-gray-300 h-full">
                            <div class="w-full h-full">
                                <div class="col-span-2 p-2 my-auto flex flex-col place-items-center items-center">
                                    <span
                                        class="text-4xl sm:text-6xl font-bold py-1 px-2 mb-20 text-red-500 text-shadow border-b-2 border-black">
                                        @isset($_SESSION['categoria'])
                                            {{$_SESSION['categoria']}}
                                        @endisset
                                    </span>
                                    <p class="text-center text-2xl">
                                        Você acertou:
                                    </p>
                                    <div class="relative pt-1 w-1/2 my-5">
                                        <div class="flex mb-2 items-end justify-end">
                                            <div class="text-right">
                                                <span
                                                    class="text-sm font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-500 bg-gray-300">
                                                    {{ $porcentagem }} %
                                                </span>
                                            </div>
                                        </div>
                                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-red-200">
                                            <div style="width:{{ $porcentagem }}%"
                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center text-2xl">
                                        {{ $acertos }} de {{ $questoes }}
                                    </p>
                                    <form class="mt-10 w-3/5" method="get" action="{{ route('final') }}">
                                        <button type="submit"
                                        class="mt-4 w-full text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl">Tentar
                                        novamente</a>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
