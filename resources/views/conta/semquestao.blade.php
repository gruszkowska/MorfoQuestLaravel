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
                                        @if ($nula == 'todas')
                                            <div class="text-center flex flex-col justify-center items-center text-lg p-2">
                                                <p class="text-2xl">
                                                    Desculpe mas não temos mais questões para serem avaliadas!
                                                </p>
                                            </div>
                                        @elseif ($nula == 'categoria')
                                            <form class="text-center flex flex-col justify-center items-center text-lg p-2"
                                                action="{{ route('questaoAvaliada') }}" method="post">
                                                @csrf
                                                <p class="text-2xl">
                                                    Desculpe mas não temos mais questões nessa categoria para serem
                                                    avaliadas!
                                                </p>
                                                <br><br>
                                                <p class="text-xl">
                                                    Deseja tentar outra categoria?
                                                </p>
                                                <br><br>
                                                <div class="w-3/4">
                                                    <label class="p-2 flex justify-between items-center" for="categoria_id">
                                                        <div>Escolha uma categoria:</div>
                                                        <select class="w-1/2 justify-self-end rounded p-2"
                                                            name="categoria_id" id="categoria_id" required>
                                                            <option value="" disabled selected>Selecione uma categoria</option>
                                                            @foreach ($menu as $categoria)
                                                                <option value="{{ $categoria->id }}">
                                                                    {{ $categoria->categoria }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                                <br>
                                                <button type="submit"
                                                    class="mt-4 w-full text-center rounded-md bg-red-500 px-3 py-2 hover:bg-red-300 text-white hover:text-black focus:ring-2 focus:ring-red-500 col-span-6 text-xl">Avaliar</button>
                                            </form>
                                        @endif
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
