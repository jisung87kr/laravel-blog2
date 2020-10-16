<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

    // protected $dates = [
    //     'seen_at',
    // ];

    protected $fillable = ['title', 'content', 'user_id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
