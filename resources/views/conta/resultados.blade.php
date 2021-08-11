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
                                        <div>
                                            <table>
                                                <tr class="uppercase">
                                                    <th>Categoria</th>
                                                    <th>Pontuação</th>
                                                    <th>Data</th>
                                                    <th>Hora</th>
                                                    <th>Detalhes</th>
                                                </tr>
                                                @foreach ($pontuacoes as $pontuacao)
                                                    <tr class="text-center">
                                                        <td>{{ $pontuacao->categoria->categoria }}</td>
                                                        <td>{{ $pontuacao->porcentagem }} %</td>
                                                        <td>{{ date('d/m/Y', strtotime($pontuacao->updated_at)) }}</td>
                                                        <td>{{ date('H:i', strtotime($pontuacao->updated_at)) }}</td>
                                                        <td>
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
                                            </table>
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
