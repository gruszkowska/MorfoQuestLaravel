<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            background: url('img/logo_pb.png') repeat-y;
            background-position: center top;
            margin: 1.5em;
        }

        .logo {
            width: 30%;
            position: absolute;
            top: 2px;
            right: 2px;
        }

        .categoria {
            font-size: 2em;
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
            padding-left: 3em;
            padding-bottom: 0.5em;
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
                            @if($resposta->correta == 1)
                                <li class="correta">
                                    {{ $resposta->resposta }}
                                </li>
                            @else
                                <li>
                                    {{ $resposta->resposta }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </span>
                <br>
            @endforeach
        </span>
    </div>
</body>

</html>
