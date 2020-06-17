<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'contactNum', 'email', 'description', 'state_id', 'usersRequest'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
   
    public function assignUsers($numOfUsers) {
       $users = User::withCount('tickets')->orderby('tickets_count', 'asc')->take($numOfUsers)->get();
       return ($users);
    }    
}
