<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class OnboardingConversation extends Conversation
{
    protected $name;

    protected $number;

    protected $query;

    public function askName()
    {
        $this->ask('Olá, qual seu nome?', function(Answer $answer) {
            // Save result
            $this->name = $answer->getText();

            $this->say('Prazer, '.$this->name);
            $this->askNumber();
        });
    }

    public function askNumber()
    {
        $this->ask('Qual seu número de WhatsApp? Entraremos em contato por ele.', function(Answer $answer) {
            // Save result
            $this->number = $answer->getText();

            $this->say('Certo, '.$this->name);
            $this->askHelp();
        });
    }

    public function askHelp()
    {
        $this->ask('Para adiantar nosso atendimento, como podemos te ajudar?', function(Answer $answer) {
            // Save result
            $this->query = $answer->getText();

            $this->say('Okay, sua dúvida foi enviada, entraremos em contato em breve.
            Obrigado por nos contactar.');
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askName();
    }
}