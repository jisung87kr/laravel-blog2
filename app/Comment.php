<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'content', 'parent', 'created_at', 'published_at'];
    protected $with = ['post', 'user'];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments(){
        return $this->hasMany('App\comment', 'parent')->withTrashed()->latest();
    }

    public function parent(){
        return $this->belongsTo('App\comment', 'parent');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\User');
    }
}
