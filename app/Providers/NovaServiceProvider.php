<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Request;
use App\Models\User;
use App\Nova\Metrics\DemandesParMois;
use App\Nova\Metrics\MessagesParMois;
use ChrisWare\NovaClockCard\NovaClockCard;
use Enid\Welcome\Welcome;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use ThijsSimonis\NovaListCard\NovaListCard;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [

            (new Welcome)->width('2/3'), 
            (new NovaClockCard)->width('1/3')->timezone('UTC+1')->display('analogue'),


            (new NovaListCard())
            ->title(__('Dernier messages d\'utilisateurs'))
            ->heads([__('Name'), __('E-mail')])
            ->rows(Message::select('name', 'e_mail')->orderBy('created_at', 'DESC')->limit(5)->get())
            ->width('1/2'),

            (new MessagesParMois)->width('1/2'),

            (new NovaListCard())
            ->title(__('Derrnières demandes d\'exposants'))
            ->heads([__('Name'), __('E-mail')])
            ->rows(Request::select('name', 'e_mail')->orderBy('created_at', 'DESC')->limit(5)->get())
            ->width('1/2'),

            (new DemandesParMois())->width('1/2'),


        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
        ];
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
