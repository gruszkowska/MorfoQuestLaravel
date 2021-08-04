<div class="mb-10 md:col-start-1 md:col-end-5 lg:col-start-1 lg:col-end-4 text-lg font-thin uppercase">
    <div
        class="w-full grid grid-cols-12 container items-center content-center justify-center p-2 border-2 border-dotted border-black dark:border-gray-300">
        @foreach ($menu as $categoria)
            <ul class="col-start-1 col-end-12 px-2 dark:text-white divide-y divide-black dark:divide-white">
                <li class="p-2 hover:text-red-500">
                    @isset($_SESSION['categoria'])
                        @if ($_SESSION['categoria'] == $categoria->categoria || isset($_SESSION['catgeoria']['categoria']) && $_SESSION['categoria']['categoria'] == $categoria->categoria)
                            <a class="rounded p-2 text-red-500 font-medium"
                                href="{{ route('categorias.show', ['categoria' => $categoria]) }}">{{ $categoria->categoria }}</a>
                        @else
                            <a class="rounded p-2"
                                href="{{ route('categorias.show', ['categoria' => $categoria]) }}">{{ $categoria->categoria }}</a>
                        @endif
                    @else
                        <a class="rounded p-2"
                            href="{{ route('categorias.show', ['categoria' => $categoria]) }}">{{ $categoria->categoria }}</a>
                    @endisset
                </li>
            </ul>
        @endforeach
    </div>
</div>
