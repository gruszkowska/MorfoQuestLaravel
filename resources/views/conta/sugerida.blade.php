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
                                        <div class="text-center flex flex-col justify-center items-center text-lg p-2">
                                            <p class="text-2xl">
                                                Sua sugestão foi computada com sucesso!
                                            </p>
                                            <br><br>
                                            <p class="text-2xl">
                                                Deseja continuar sugerindo?
                                            </p>
                                            <br><br>
                                            <p class="text-2xl">
                                                Por favor escolha uma das opções para continuar:
                                            </p>
                                            <br><br>
                                            <a class="text-red-600 hover:underline" href="{{ route('multipla') }}">Multipla Escolha</a>
                                            <br>
                                            <a class="text-red-600 hover:underline" href="{{ route('vouf') }}">Verdadeiro ou Falso</a>
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
