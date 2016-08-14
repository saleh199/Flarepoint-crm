<?php

namespace App\Listeners;

use App\Events\NewClientIsRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Slack;

class SlackAllNewClientNews
{
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
     * @param  NewClientIsRegistered  $event
     * @return void
     */
    public function handle(NewClientIsRegistered $event)
    {
        
        Slack::from('New Client Bot')
        ->to('#random')
        ->withIcon(':ghost:')
        ->SetAllowMarkdown(true)
        ->send('<' . url('clients') .'/' . $event->client->id .'|' . 
            $event->client->name .'>' 
            . '... Is now registered as a new client!');
    }
}
