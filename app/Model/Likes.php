<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Likes extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function reply()
    {
        return $this->belongsTo(Reply::class,'reply_id');
    }
}
