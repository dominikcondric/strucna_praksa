<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'contactNum', 'email', 'description', 'state_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment')->withTimestamps();
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }
   
    public function assignUser() {
        $minTickets = \App\User::first()->tickets()->count();
        $leastTicketsUser = \App\User::first();
        foreach (\App\User::all() as $user) {
            if ($user->tickets()->count() < $minTickets) {
                $minTickets = $user->tickets()->count();
                $leastTicketsUser = $user;
            }
        }

        return ($leastTicketsUser->id);
    }    
}
