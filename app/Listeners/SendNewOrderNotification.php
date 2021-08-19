<?php

namespace App\Listeners;

use App\Events\OrderValidated;
use App\Models\User;
use App\Notifications\NewOrder;
use App\Notifications\NewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewOrderNotification
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
     * @param  OrderValidated  $event
     * @return void
     */
    public function handle(OrderValidated $event)
    {
    	$admins = User::where('role', 'admin')->get();
    	$admins->each(function($admin) use ($event){
			$admin->notify(new NewOrderNotification($event->order));
		});
		
    }
}
