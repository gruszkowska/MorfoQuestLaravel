@extends('layouts.app')

@section('content')

    <div id="body" class="h-full">
        <div class="mx-5 mt-10">
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
                                        <div class="flex items-center justify-center">
                                            <div class="container">
                                                <table
                                                    class="w-full flex flex-row flex-no-wrap overflow-hidden my-5 text-center">
                                                    <thead class="text-black">
                                                        @for ($i = 0; $i < $count; $i++)
                                                            <tr
                                                                class="flex flex-col flex-no wrap lg:table-row mb-2 lg:mb-0 divide-y lg:divide-none lg:border-b lg:border-black">
                                                                <th
                                                                    class="rounded-tl lg:rounded-none bg-red-500 lg:bg-gray-300">
                                                                    Categoria</th>
                                                                <th class="bg-red-500 lg:bg-gray-300">Pontuação</th>
                                                                <th class="bg-red-500 lg:bg-gray-300">Data</th>
                                                                <th class="bg-red-500 lg:bg-gray-300">Hora</th>
                                                                <th
                                                                    class="rounded-bl lg:rounded-none bg-red-500 lg:bg-gray-300">
                                                                    Detalhes</th>
                                                            </tr>
                                                        @endfor
                                                    </thead>
                                                    <tbody class="flex-1 lg:flex-none">
                                                        @foreach ($pontuacoes as $pontuacao)
                                                            <tr
                                                                class="flex flex-col flex-no wrap lg:table-row mb-2 lg:mb-0">
                                                                <td class="truncate rounded-tr">
                                                                    {{ $pontuacao->categoria->categoria }}</td>
                                                                <td class="truncate">
                                                                    {{ $pontuacao->porcentagem }} %</td>
                                                                <td class="truncate">
                                                                    {{ date('d/m/Y', strtotime($pontuacao->updated_at)) }}
                                                                </td>
                                                                <td class="truncate">
                                                                    {{ date('H:i', strtotime($pontuacao->updated_at)) }}
                                                                </td>
                                                                <td style="height: 50px">
                                                                    @isset($pontuacao->quiz_id)
                                                                        <a href="{{ route('resultadosContaDetalhes') }}"
                                                                            class="no-underline"
                                                                            onclick="event.preventDefault();document.getElementById('resultadosContaDetalhes').submit();">

                                                                            <i class="text-sm fas fa-info-circle"></i>
                                                                        </a>
                                                                        <form id="resultadosContaDetalhes"
                                                                            action="{{ route('resultadosContaDetalhes') }}"
                                                                            method="POST" class="hidden">
                                                                            {{ csrf_field() }}
                                                                            <input type="text" name="quiz_id"
                                                                                value="{{ $pontuacao->quiz_id }}" hidden>
                                                                        </form>
                                                                    @endisset
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <br><br>
                                        {{ $pontuacoes->links() }}
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
