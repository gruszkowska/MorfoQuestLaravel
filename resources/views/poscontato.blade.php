@extends('layouts.app')

@section('content')

    <div id="body" class="w-3/4 h-full m-auto mb-20">
        <div class="container mx-5 mt-10">
            <div class="grid pr-10">
                <div
                    class="container flex content-center justify-center p-5 border-2 border-dotted border-black dark:border-gray-300">
                    <div class="container flex content-center justify-center p-5 bg-gray-300">
                        <div class="w-full">
                            <div class="w-4/5 mx-auto">
                                <div class="col-span-6 text-xl mb-2">
                                    <p class="text-center">
                                        Obrigada por entrar em contato conosco!
                                    </p>
                                    <br>
                                    @if ($error == 'ok')
                                        <p class="text-center text-green-500">
                                            Sua mensagem foi enviada com sucesso!
                                        </p>
                                    @else
                                        <p class="text-center text-red-500">
                                            Desculpe houve algum problema no envio da sua mensagem, tente novamente em
                                            alguns instantes!
                                        </p>
                                    @endif
                                    <br>
                                    <p class="text-center">
                                        Quer voltar para a nossa 
                                        <a class="text-red-600 hover:underline"
                                            href="{{ route('home') }}">home</a>
                                        ?
                                    </p>
                                    <br>
                                    <p class="text-center">
                                        Ou quer nos enviar outra
                                        <a class="text-red-600 hover:underline"
                                            href="{{ route('contato') }}">mensagem</a>
                                        ?
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
