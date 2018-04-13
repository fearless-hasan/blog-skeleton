<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function getRouteKeyName(){
        return 'name';
    }
}
