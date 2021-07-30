<?php

namespace App\Nova;

use Faker\Provider\ar_JO\Text as Ar_JOText;
use Illuminate\Http\Request as Requ;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Pdmfc\NovaCards\Info;


class Request extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Request::class;


    public static function label() {
        return 'Demandes d\'exposants';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'company_name',
        
    ];


    public static $group = 'Messages des utilisateurs';


    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Requ $request)
    {
        return [
            //ID::make(__('ID'), 'id')->sortable(),

            Text::make('Nom de l\'exposant', 'name')->sortable()->readonly(true), 
            Text::make('E-mail de l\'exposant', 'e_mail')->hideFromIndex()->readonly(true), 
            Text::make('Nom du stade', 'company_name')->sortable()->readonly(true), 
            Text::make('Produits proposer', 'products')->hideFromIndex()->readonly(true), 
            Text::make('Lien vers un site', 'link')->hideFromIndex()->readonly(true), 
            Trix::make('Message de l\'exposant', 'body')->readonly(true), 
            Boolean::make('Requete acceptée', 'appouved')->sortable()

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Requ $request)
    {
        return [
            (new Info())
                ->info('Ci-dessous les demandes d\'exposants voulant faire aprtie du marché. Vous pouvez changer leur statu de leur demande avec le petit crayon. 
                N\'oubliez pas de contacter les exposant par mail pour les tenirs au courant. Leurs adresse e-mail ansi que des infos suplémentaires sont disponible en cliquant sur le petit oeil.  ')
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Requ $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Requ $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Requ $request)
    {
        return [];
    }
}
