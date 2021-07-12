<?php

namespace App\Mail;

use App\Models\Contato;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MsgContato extends Mailable
{
    use Queueable, SerializesModels;
    public $nome;
    public $email;
    public $assunto;
    public $mensagem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contato $contato)
    {
        $this->nome = $contato->nome;
        $this->email = $contato->email;
        $this->assunto = $contato->assunto;
        $this->mensagem = $contato->mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.msgcontato');
    }
}
