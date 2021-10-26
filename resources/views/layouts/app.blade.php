<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google SearchConsole -->
    <meta name="google-site-verification" content="XlSFvtTFzKzrjMlAOGgNqZ1sJeLbQG9Jwti95Yi5SII" />
    <meta name="title" content="MorfoQuest">
    <meta name="description" content="Site de questionários em morfologia">
    <meta name="keywords" content="anatomia, anatomy, humanbody, morfologia">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Portuguese">
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="Mariana Gruszkowska de Lacerda Soares">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MorfoQuest') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href={{ asset('css/style.css') }} rel="stylesheet">

    <!--Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>

<body class="bg-gray-50 h-screen antialiased leading-none font-sans">
    <div id="app">
        @component('_components.header')
        @endcomponent

        <div class="flex justify-center">
            @yield('content')
        </div>

        @component('_components.footer')
        @endcomponent
    </div>
</body>


<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

<script>
    $(function() {
        var html = $('html')

        var input = $('.xxx')

        var respostas = $('#respostas')

        var enviar = $('#enviar')

        enviar.hide()

        respostas.on('click', function() {
            if ($('input:checked').length == $('.question').length) {
                var correta = input.attr('class').includes('correta')
                input.toggleClass('correta', !correta)
                input.after('<i id="correta" class="text-green-500 object fas fa-check"></i>')
                respostas.hide()
                enviar.show()
                $('#erro').hide()
                $('input').attr('disabled', true);
            } else {
                $('#span_erro').remove()
                $('#erro').append(
                    '<span id="span_erro" class="text-sm text-red-500 text-center p-2">* Todas as questões são de preenchimento obrigatório!</span>'
                )
            }
        })

        enviar.on('click', function() {
            $('input').prop('disabled', false)
        })

    });
</script>

</html>
