<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Pdmfc\NovaCards\Info;

class Edition extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Edition::class;


    public static function label() {
        return ' Editions';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'edition_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'edition_number',
        'edition_date'
    ];


    public static $group = ' Editions';


    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            //ID::make(__('ID'), 'id')->sortable(),
            Text::make('Numéro de l\'édition', 'edition_number')->rules('required'), 
            Text::make('Année de l\'edition', 'edition_date')->rules('required', 'max:4'), 

            new Panel("Le prix", $this->price()),
            new Panel("Le lieu", $this->where()),
            new Panel("La date", $this->time()),
            new Panel("Description pour la page d'acceuil", $this->desc()),
            new Panel("Note", $this->note()),

            HasOne::make('archive'), 
        ];
    }


    private function price()
    {
        return [
            Text::make('Prix', 'price')->hideFromIndex(), 
            Text::make('Prix Enfant', 'kids_price')->hideFromIndex(), 
        ];
    }

    private function where()
    {
        return [
            Text::make('Lieu', 'place')->hideFromIndex(), 
            Text::make('Adresse', 'adress')->hideFromIndex(), 
            Textarea::make('Lien google Map de l\'adresse', 'google_map')->hideFromIndex(),
        ];
    }

    private function time()
    {
        return [
            DateTime::make('Date de début', 'bigining_date'), 
            DateTime::make('Date de fin', 'ending_date'),
            Text::make('Date aproximative', 'aprox_date')->hideFromIndex(), 
        ];
    }

    private function desc()
    {
        return [
            Trix::make('Desciption rapide', 'catch'),
            Trix::make('Présenation de l\'édition','presentation'), 
        ];
    }

    private function note()
    {
        return [
            Trix::make('Note covid ou autre (affiché dans les info pratique de la page buy)', 'Note'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {

            return [
                (new Info())
                    ->info('Ci-dessous vous trouverez la liste des editions du marché des Gourmets. Vous pouvez en ajouter une nouvelle à chaque nouvelle édition, cela mettra automatiquement le site à jour avec les nouvelles informations.'),
                (new Info())
                    ->danger('Seul les informations de la derrnére édition crée seront affichées sur le site. Si vous en avez créé une nouvelle sans le vouloir, vous pouvez toujours la suprimer.')
            
                ];

    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
