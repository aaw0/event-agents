<?php

namespace Aaw0\EventAgents;

use App\Nova\Resource;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class EventAgent extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Aaw0\EventAgents\Models\EventAgent::class;
    // public static $model = \App\Models\Slide::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','title_ar','title_en'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Image::make('Image')->disk('public')->required(),
            Image::make('Image Webp')->disk('public')->hideFromIndex()->nullable()
            ->help('Please upload .Webp image if you have it, you can create one online,
            <a href="https://image.online-convert.com/convert-to-webp" target="_blank" rel="noopener noreferrer">
            https://image.online-convert.com/convert-to-webp</a> '),
            Text::make('Title')->onlyOnIndex(),
            Select::make('Image Bg')->options([
                'carousel-bg-gray'=>'Gray',
                'carousel-bg-Black'=>'Black',
                'carousel-bg-blue'=>'Blue',
                'carousel-bg-blue-2'=>'Blue 2',
                'carousel-bg-blue-3'=>'Blue 3',
                'carousel-bg-red'=>'Red',
                'carousel-bg-orange'=>'Orange',
                'carousel-bg-gold'=>'Gold',
                'carousel-bg-olive'=>'Olive',
                'carousel-bg-purple'=>'Purple',
            ])->hideFromIndex(),
            Text::make('Title Ar')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Title En')->required()->rules(['max:255'])->hideFromIndex(),
            Text::make('Link')->rules(['max:255'])->required()->hideFromIndex(),
            Text::make('Link Text Ar')->rules(['max:255'])->default('Learn More')->hideFromIndex(),
            Text::make('Link Text En')->required()->rules(['max:255'])->default('Learn More')->hideFromIndex(),
            Text::make('Color Class')->rules(['max:255'])->default('text-white')->hideFromIndex(),
            Text::make('Position')->rules(['max:255'])->default('center center')->hideFromIndex(),
            Number::make('Sort Order')->onlyOnIndex(),
            NovaTinyMCE::make('Content Ar')->nullable()->options(['use_lfm' => true])->hideFromIndex(),
            NovaTinyMCE::make('Content En')->nullable()->options(['use_lfm' => true])->hideFromIndex(),


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
        return [];
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
