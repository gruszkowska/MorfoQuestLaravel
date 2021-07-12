@component('mail::message')

<h3>Nome:</h3>
<p class="sub">{{ $nome }}</p>

<h3>Email:</h3>
<p class="sub">{{ $email }}</p>

<h3>Assunto:</h2>
<p class="sub">{{ $assunto }}</p>

<h3>Mensagem:</h3>
<p class="sub">{{ $mensagem }}</p>

@endcomponent

