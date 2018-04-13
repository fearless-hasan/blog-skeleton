<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'publication_status', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function scopeFilter($query, $filters){
        if(array_key_exists('month', $filters) && $month = $filters['month']){
            $query -> whereMonth('created_at', Carbon::parse($month)->month);
        }
        if(array_key_exists('year', $filters) &&$year = $filters['year']){
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, COUNT(*)')
                ->groupBy('year', 'month')
                ->orderByRaw('min(created_at) desc')
                ->get();
    }

    public function addComment($comment){
        $this->comments()->create(compact('comment'));
    }
}
