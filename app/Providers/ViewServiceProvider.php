<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ConferenceAdminController;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('dashboard.includes.adminsidenav', function ($view) {
            $a = DB::table('conferenceadmin')
            ->where('conferenceadmin.id', '=', ConferenceAdminController::all_coadmin()->id )
            ->get();

                $view->with('coadmin', $a);
        });
    }
}
