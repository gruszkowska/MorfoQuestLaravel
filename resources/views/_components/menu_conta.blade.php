<ul class="grid grid-cols-3 p-2 text-lg text-center justify-between">
    <li class="rounded-l p-3 border border-black @if(isset($page) && $page == 'resultadosConta') bg-red-500 border-b-0 rounded-bl-none @endif">
        <a class="py-2 px-8 @if(isset($page) && $page == 'resultadosConta') text-2xl @endif hover:underline" href="{{ route('resultadosConta') }}">Resultados</a>
    </li> 
    <li class="p-3 border border-black @if(isset($page) && $page == 'sugerirQuestoes') bg-red-500 border-b-0 @endif">
        <a class="py-2 px-8 @if(isset($page) && $page == 'sugerirQuestoes') text-2xl @endif hover:underline" href="{{ route('sugerirQuestoes') }}">Sugerir questões</a>
    </li>
    <li class="rounded-r p-3 border border-black @if(isset($page) && $page == 'avaliarQuestoes') bg-red-500 border-b-0 rounded-br-none @endif">
        <a class="py-1 px-4 @if(isset($page) && $page == 'avaliarQuestoes') text-2xl @endif hover:underline" href="{{ route('avaliarQuestoes') }}">Avaliar questões</a>
    </li>
</ul>