<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Botman\OnboardingConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message=="ola") {

                $botman->startConversation(new OnboardingConversation);
            }else {
                $botman->reply("Digite ola para começar uma conversa.");
            }

            
        });

        $botman->listen();
    }
}

