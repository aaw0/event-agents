<?php

namespace Aaw0\AdnecSliders\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


class AdnecSlider extends Model implements Sortable
{
    use HasFactory, SoftDeletes, SortableTrait;
    protected $table = 'adnec_slides';


    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public $appends = ['title','content','link_text','supported_image','supported_image_bg'];


    public function getTitleAttribute()
    {
        $title = 'title_' . \App::getLocale();
        return $this->$title ?? $this->title_en;
    }

    public function getLinkTextAttribute()
    {
        $location = 'link_text_' . \App::getLocale();
        return $this->$location ?? $this->location_en;
    }


    public function getContentAttribute()
    {
        $content = 'content_' . \App::getLocale();
        return $this->$content ?? $this->content_en;
    }

    public function getSupportedImageAttribute()
    {
        if($this->image_webp && webp_supported()) {
            return Storage::url($this->image_webp);
        }
        elseif ($this->image) {
            return Storage::url($this->image);
        }
        else {
            return null;
        }
    }

    public function getSupportedImageBgAttribute()
    {
        if ($this->image_bg) {
            return asset('images/bgs/'.$this->image_bg.'.svg');
        }
        else {
            return null;
        }
    }



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
