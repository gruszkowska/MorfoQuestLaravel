@extends('layouts.app')

@section('content')

    <div id="body" class="h-full md:m-auto">
        <div class="container mx-5 mt-10">
            <div class="md:grid md:grid-cols-12 md:gap-8 pr-3 md:p-0">
                @component('_components.menu', ['menu' => $menu])

                @endcomponent
                <div class="mb-20 md:col-start-5 md:col-end-13 lg:col-start-4 lg:col-end-13">
                    <div
                        class="container flex items-center content-center justify-center p-5 border-2 border-dotted border-black dark:border-gray-300 h-full mr-10">
                        <div class="container flex content-center justify-center p-5 bg-gray-300 h-full">
                            <div class="w-full h-full">
                                <div class="h-full col-span-6 p-2 my-auto flex flex-col place-items-center items-center">
                                    <p class="text-center text-2xl">
                                        E ai? Vamos começar?
                                    </p>
                                    <br><br>
                                    <img src="img/fundo_mini.png">
                                    <br><br>
                                    <p class="text-center text-2xl">
                                        Escolha uma categoria!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
