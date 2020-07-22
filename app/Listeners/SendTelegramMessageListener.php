<?php

namespace App\Listeners;

use App\Classes\Utilits;
use App\Events\SendTelegramMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTelegramMessageListener
{

    use Utilits;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendTelegramMessageEvent $event)
    {
        if (is_null($event))
            return;

        $this->sendToTelegram($event->id,$event->message,$event->keyboard);
    }
}
