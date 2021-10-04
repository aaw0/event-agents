<?php

namespace Aaw0\EventAgents\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


class EventAgent extends Model implements Sortable
{
    use HasFactory, SoftDeletes, SortableTrait;
    protected $table = 'event_agents';


    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];



    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDraft($query)
    {
        return $query->where('is_published', false);
    }

    public function isPublished()
    {
        return $this->is_published;
    }

    public function isDraft()
    {
        return !$this->is_published;
    }
}
