<header class="bg-gray-300">
    <div class="container mx-auto mb-2 py-8">
        <nav class="flex justify-between items-center">
            <div>
                <a class="text-4xl" href="/">
                    <p class="font-semibold px-10 text-black">MorfoQuest</p>
                </a>
            </div>
            <ul class="flex flex-col sm:flex-row items-center">
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