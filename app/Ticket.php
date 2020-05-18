<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $primaryKey = 'ticket_id';

    public function users()
    {
        return $this->belongsToMany('App\User', 'ticket_user', 'ticket_id', 'user_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'comment_id');
    }

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id', 'ticket_id');
    }

    
}
