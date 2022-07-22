<?php

namespace Aaw0\EventAgents;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Boolean;
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

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'country';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','country','name','company','email'
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
            Boolean::make('Is Published')->sortable(),
            Select::make('Type')->options([
                'Agent / CP Organizers'=>'Agent / CP Organizers',
            ])->hideFromIndex(),
            Text::make('Country')->required()->rules(['max:255'])->sortable(),
            Text::make('Agent Name')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Company')->nullable()->rules(['max:255'])->sortable(),
            Text::make('Address')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Phone')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Mobile')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Fax')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Email')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Css Class')->nullable()->rules(['max:255'])->hideFromIndex(),
            Text::make('Bg Color')->nullable()->rules(['max:255'])->hideFromIndex(),
            Number::make('Sort Order')->onlyOnIndex(),

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
