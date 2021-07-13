<header class="bg-gray-300">
    <div class="container mx-auto mb-2 py-5">
        <nav class="flex justify-between items-center">
            <div>
                <a class="text-4xl flex flex-row items-center px-20" href="/">
                    <img src="img/logo.png" class="w-1/2">
                </a>
            </div>
            <ul class="flex flex-col sm:flex-row items-center mr-10">
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
        </nav>
    </div>
</header>