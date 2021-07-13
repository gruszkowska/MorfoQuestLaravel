<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        .logo {
            width: 30%;
            position: absolute;
            top: 2px;
            right: 2px;
        }

        .categoria {
            font-size: 1.8em;
            font-weight: bold;
        }

        .pergunta {
            font-size: 1.2em;
        }

        .resposta {
            font-size: 0.9em;
        }

        ul {
            list-style: upper-alpha;
            padding: 0;
        }

        li {
            padding-left: 1.3em;
        }

    </style>


</head>

<body>

    <img class="logo" src="img/logo.png">

    <br><br><br>

    <div>
        <span class="categoria">
            @isset($_SESSION['categoria'])
                {{ $_SESSION['categoria'] }}
            @endisset
        </span>
    </div>

    <br><br><br><br><br><br>

    <div>
        <span class="pergunta">
            @foreach ($perguntas as $key => $pergunta)
                {{ $key + 1 }} - {{ $pergunta->pergunta }}
                <span class="resposta">
                    <ul>
                        @foreach ($pergunta->respostas as $resposta)
                            <li>
                                {{ $resposta->resposta }}
                            </li>
                        @endforeach
                    </ul>
                </span>
                <br>
            @endforeach
        </span>
    </div>
</body>

</html>
