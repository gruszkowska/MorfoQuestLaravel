<header class="bg-gray-300">
    <div class="mx-auto mb-2 py-5">
        <nav class="flex justify-between items-center">
            <div>
                <a class="text-2xl sm:text-4xl flex flex-row items-center px-20" href="/">
                    <img src="img/logo.png" class="w-1/2" alt="{{ config('app.name', 'MorfoQuest') }}">
                </a>
            </div>
            <div class="flex flex-col items-center justify-items-center text-sm sm:text-base">
                <ul class="flex flex-col sm:flex-row items-center mr-10 p-2">
                    @guest
                        <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                            <a class="no-underline" href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                            <a class="no-underline" href="{{ route('register') }}">Registrar-se</a>
                        </li>
                    @else
                        <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                            <a href="{{ route('conta') }}">{{ Auth::user()->name }}</a>
                        </li>

                        <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                            <a href="{{ route('logout') }}" class="no-underline" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
                <ul class="flex flex-col sm:flex-row items-center mr-10 p-2">
                    <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                        <a href="{{ route('sobre') }}">Sobre</a>
                    </li>
                    <li class="p-2 text-black rounded hover:bg-red-500 hover:text-black">
                        <a href="{{ route('contato') }}">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
