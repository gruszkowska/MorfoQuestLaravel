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
            list-style: decimal;
            font-size: 1.2em;
        }

        .resposta {
            list-style: upper-alpha;
            font-size: 0.9em;
        }

        .icon {
            width: 1.5%;
        }

        .correta {
            color: #3B82F6;
        }

        .marcadacorreta {
            color: #10B981;
        }

        .errada {
            color: #EF4444;
        }

    </style>


</head>

<body>

    <img class="logo" src="img/logo.png">

    <br><br><br>

    <div>
        <span class="categoria">

        </span>
    </div>

    <br><br><br><br><br><br>

    <div>
        <ul class="pergunta">
            @foreach ($perguntas as $pergunta)
                @foreach ($pergunta as $p)
                    <li>
                        {{ $p->pergunta }}
                    </li>
                    <ul class="resposta">
                        @foreach ($respostas as $resposta)
                            @foreach ($resposta as $r)
                                @if ($r->pergunta_id == $p->id)
                                    @foreach ($questionario as $quest)
                                        @if ($quest->pergunta_id == $p->id && $r->correta == 1 && $quest->marcada == $r->id)
                                            <li class="marcadacorreta">
                                                {{ $r->resposta }}
                                                <img class="icon" src="img/check.png">
                                            </li>
                                        @elseif ($quest->pergunta_id == $p->id
                                            && $r->correta == 1)
                                            <li class="correta">
                                                {{ $r->resposta }}
                                                <img class="icon" src="img/check.png">
                                            </li>
                                        @elseif ($quest->pergunta_id == $p->id
                                            && $quest->marcada == $r->id)
                                            <li class="errada">
                                                {{ $r->resposta }}
                                                <img class="icon" src="img/wrong.png">
                                            </li>
                                        @elseif($quest->pergunta_id == $p->id)
                                            <li>
                                                {{ $r->resposta }}
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                    <br>
                @endforeach
            @endforeach
        </ul>
    </div>
</body>

</html>
