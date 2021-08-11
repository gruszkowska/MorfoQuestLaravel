<?php

namespace App\Console\Commands;

use App\Http\Controllers\AvaliarController;
use App\Models\Avaliar;
use App\Models\Fabrica;
use App\Models\Pergunta;
use App\Models\Resposta;
use Illuminate\Console\Command;

class VerificarFabrica extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $avaliadas_obj = Avaliar::select('fabrica_id')->where('categorizacao', 'sim')->where('validade', 'sim')->where('relevancia', 'sim')->where('acertibilidade', 'sim')->get();

        $avaliadas  = json_decode($avaliadas_obj, '1');
        $avaliacoes = array_count_values(array_column($avaliadas, 'fabrica_id'));

        foreach ($avaliacoes as $key => $a) {
            if ($a >= 5) {
                $avaliados = Avaliar::where('fabrica_id', $key)->get();
                $pergunta_id = Pergunta::select('id')->orderBy('id', 'desc')->first();
                $resposta_id = Resposta::select('id')->orderBy('id', 'desc')->first();
                $fabrica = Fabrica::where('id', $key)->first();
                $pergunta = Pergunta::create([
                    'id' => $pergunta_id->id + 1,
                    'pergunta' => $fabrica->pergunta,
                    'categoria_id' => $fabrica->categoria_id
                ]);
                if ($fabrica->resposta_c == null) {
                    if ($fabrica->correta == 'verdadeiro') {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 1,
                            'resposta' => $fabrica->resposta_a,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '1'
                        ]);
                        $resposta2 = Resposta::create([
                            'id' => $resposta_id->id + 2,
                            'resposta' => $fabrica->resposta_b,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '0'
                        ]);
                    }
                    elseif ($fabrica->correta == 'falso') {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 1,
                            'resposta' => $fabrica->resposta_a,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '0'
                        ]);
                        $resposta2 = Resposta::create([
                            'id' => $resposta_id->id + 2,
                            'resposta' => $fabrica->resposta_b,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '1'
                        ]);
                    }
                }
                else {
                    if ($fabrica->correta == 'a') {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 1,
                            'resposta' => $fabrica->resposta_a,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '1'
                        ]);
                    }
                    else {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 1,
                            'resposta' => $fabrica->resposta_a,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '0'
                        ]);
                    }

                    if ($fabrica->correta == 'b') {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 2,
                            'resposta' => $fabrica->resposta_b,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '1'
                        ]);
                    }
                    else {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 2,
                            'resposta' => $fabrica->resposta_b,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '0'
                        ]);
                    }

                    if ($fabrica->correta == 'c') {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 3,
                            'resposta' => $fabrica->resposta_c,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '1'
                        ]);
                    }
                    else {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 3,
                            'resposta' => $fabrica->resposta_c,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '0'
                        ]);
                    }

                    if ($fabrica->correta == 'd') {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 4,
                            'resposta' => $fabrica->resposta_d,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '1'
                        ]);
                    }
                    else {
                        $resposta1 = Resposta::create([
                            'id' => $resposta_id->id + 4,
                            'resposta' => $fabrica->resposta_d,
                            'pergunta_id' => $pergunta->id,
                            'correta' => '0'
                        ]);
                    }
                }

                $fabrica->delete();
                foreach ($avaliados as $aval) {
                    $aval->delete();
                }
            }
        }
        
        return Fabrica::all();
    }
}
