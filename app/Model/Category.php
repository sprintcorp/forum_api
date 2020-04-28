<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function getPathAttribute()
    {
        return asset("api/category/$this->slug");
    }
}
