@extends('layouts.app')

@section('content')

<div id="body" class="w-3/4 h-full m-auto mb-20">
    <div class="container mx-5 mt-10">
        <div class="grid pr-10">
            <div
                class="container flex content-center justify-center p-5 border-2 border-dotted border-black dark:border-gray-300">
                <div class="container flex content-center justify-center p-5 bg-gray-300">
                    <form class="w-full" action="{{ route('formcontato') }}" method="post">
                        @csrf
                        <div class="w-4/5 mx-auto">
                            <div class="col-span-6 text-xl mb-2">
                                <p class="text-center">
                                    Tem dúvidas, reclamações ou sugestões?
                                </p>
                                <br>
                                <p class="text-center">
                                    Envie uma mensagem e será repondido o mais breve possível!
                                </p>
                            </div>
                            <div class="col-span-6">
                                <label class="p-1" for="name">Nome:</label>
                                <div class="py-1">
                                    <input class="w-full focus:border-black rounded-md p-1" type="text" name="nome"
                                        id="nome" placeholder="Nome Completo" required>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <label class="p-1" for="name">E-mail:</label>
                                <div class="py-1">
                                    <input class="w-full focus:border-black rounded-md p-1" type="email" name="email"
                                        id="email" placeholder="teste@teste.com.br" required>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <label class="p-1" for="name">Assunto:</label>
                                <div class="py-1">
                                    <input class="w-full focus:border-black rounded-md p-1" type="assunto"
                                        name="assunto" id="subject" required>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <label class="p-1" for="name">Mensagem:</label>
                                <div class="py-1">
                                    <textarea class="w-full focus:border-black rounded-md p-1" type="mensage"
                                        name="mensagem" id="mensagem" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-span-6 text-right pt-2">
                                <button type="submit"
                                    class="px-3 py-1 inline-flex justify-center rounded-md bg-red-500 text-white focus:text-black">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection