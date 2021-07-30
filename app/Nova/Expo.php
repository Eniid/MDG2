<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Pdmfc\NovaCards\Info;
use Ctessier\NovaAdvancedImageField\AdvancedImage;

class Expo extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Expo::class;

    public static function label() {
        return 'Exposants';
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
        'id',
    ];

    public static $group = 'Exposants';


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

            Text::make('Nom', 'name')->rules('required'), 
            Trix::make('Desciption', 'desciption')->rules('required', 'max:200'), 
            Text::make('Lien', 'link'), 
            AdvancedImage::make('Image', 'img')->croppable()->resize(null, 300),
            Boolean::make('Présent cette année', 'this_year'), 

            BelongsToMany::make('lables')
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
            ->info('Ici se trouve la liste de vos exposants. Si un exposant n\'est pas présent lors de cette étidtion mais reviendra peut-être l\'an prochain, pas besoin de la supprimer, décochez simplement la case "présent cette année".'),
        
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
