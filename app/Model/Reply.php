<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }

    public function like()
    {
        return $this->hasMany(Likes::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/reply");
    }
}
