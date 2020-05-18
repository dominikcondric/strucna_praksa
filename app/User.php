<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name'
    ];

    public function tickets() {
        return $this->belongsToMany('App\Ticket', 'ticket_user', 'user_id', 'ticket_id')->withPivot('comment_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'comment_id');
    }
}
