<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

use App\Models\Inbox;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Request::is('admin/*')){
          // Notifikasi New Inbox
          $getNotifInbox = Inbox::where('flag_read', 'N')->orderBy('created_at', 'desc')->get();
          view()->share('getNotifInbox', $getNotifInbox);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
