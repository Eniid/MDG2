<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Pdmfc\NovaCards\Info;
use Ctessier\NovaAdvancedImageField\AdvancedImage;

class About extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\About::class;


    public static function label() {
        return 'Qui êtes-vous? ';
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



    public static $group = 'Vos informations';


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

            new Panel('Desription du marché des gourmets', $this->mdgFields()), 
            new Panel('Enjeux du marché des gourmets', $this->whyFields()), 
            new Panel('Le Rotary Club', $this->rotariFields()),  

        ];
    }

    private function mdgFields()
    {
        return [
            Text::make('Titre', 'mdg_title')->rules('required'), 
            Trix::make('Desciption du marché', 'mdg_desc')->rules('required'),
            AdvancedImage::make('Image', 'mdg_img')->resize(600),
        ];
    }

    private function whyFields()
    {
        return [
            Text::make('Titre', 'why_title')->rules('required'), 
            Trix::make('Explication sur les enjeux du marché', 'why_desc')->rules('required'), 
            AdvancedImage::make('Image', 'why_img')->resize(600),
        ];
    }

    private function rotariFields()
    {
        return [
            Text::make('Titre', 'rotari_title')->rules('required'), 
            Trix::make('Desciption du rotary', 'rotari_desc')->rules('required'), 
            AdvancedImage::make('Image', 'rotari_img')->resize(600),
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
            ->info('Les informations ci dessous s\'affichent sur la page "about us", utilisez le petit crayon pour les modifier.'),
        
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
