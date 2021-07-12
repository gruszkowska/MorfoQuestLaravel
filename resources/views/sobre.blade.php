@extends('layouts.app')

@section('content')

    <div id="body" class="w-3/4 h-full m-auto mb-20">
        <div class="container mx-5 my-10">
            <div class="grid pr-10">
                <div
                    class="container flex content-center justify-center p-5 border-2 border-dotted border-black dark:border-gray-300">
                    <div class="container flex content-center justify-center p-5 bg-gray-300">
                        <div class="w-full">
                            <div class="w-4/5 mx-auto">
                                <div class="text-justify md:text-lg">
                                    <p>
                                        &nbsp&nbsp&nbsp&nbsp A busca pelas melhores formas de troca e disseminação de
                                        conhecimento é algo muito forte e constante na vida de apaixonados pela docência.
                                        Nos tempos atuais veículos digitais são os mais procurados, principalmente após a
                                        recente mundial do olhar sobre a educação.
                                    </p>
                                    <br>
                                    <p>
                                        &nbsp&nbsp&nbsp&nbsp Falando especificamente sobre a Morfologia, acredita-se que
                                        nenhum meio digital existente é capaz de suprir a necessidade de um estudo prático
                                        presencial. Mas quando se trata de fixar o conhecimento teórico e para auxiliar no
                                        estudo prático, métodos digitais tem sido muito bem vistos.
                                    </p>
                                    <br>
                                    <p>
                                        &nbsp&nbsp&nbsp&nbsp Com o intuíto de servir a esse propósito esse site foi
                                        desenvolvido com os objetivos de ser um banco de perguntas morfológicas em que o
                                        interessado possa a qualquer hora do dia, bastanto apenas um acesso a internet,
                                        estudar.
                                    </p>
                                    <br>
                                    <p>
                                        &nbsp&nbsp&nbsp&nbsp O desenvolvimento do site e criação das perguntas iniciais para
                                        o funcionamento do app foram desenvolvidos por:
                                    </p>
                                    <br>
                                    <p class="text-center md:text-xl">
                                        Mariana Gruszkowska de Lacerda Soares - Biomedicina - UFF
                                    </p>
                                    <br>
                                </div>
                                <div class="text-center md:text-lg">
                                    <br>
                                    <p>
                                        Para começar escolha uma <a class="text-red-600 hover:underline"
                                            href="{{ route('home') }}">categoria</a>, responda à perguntas aleatórias
                                        sobre o
                                        tema de interesse e teste seus conhecimentos morfológicos!
                                    </p>
                                    <br>
                                    <p>
                                        Tem dúvidas, reclamações ou sugestões? Entre em <a
                                            class="text-red-600 hover:underline" href="{{ route('contato') }}">contato</a>
                                        com a gente!
                                    </p>
                                </div>
                                <div class="grid text-md mt-10">
                                    <div class="p-5 border border-red-500 justify-self-center">
                                        <p>
                                            * Até o momento temos
                                            {{ $perguntas }}
                                            perguntas, sendo:
                                        </p>
                                        <br>
                                        @foreach ($categorias->sortByDesc('perguntas') as $categoria)
                                            @if ($categoria->perguntas != 0)
                                                <div class="grid grid-cols-12 gap-2 items-center my-2">
                                                    <div class="col-span-2">
                                                        <p class="text-sm">
                                                            {{ $categoria->perguntas }}
                                                        </p>
                                                    </div>
                                                    <div class="col-span-1 grid justify-items-center">
                                                        <i class="text-sm fas fa-long-arrow-alt-right"></i>
                                                    </div>
                                                    <div class="col-span-9">
                                                        <p class="text-sm pl-1">
                                                            {{ $categoria->categoria }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
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
