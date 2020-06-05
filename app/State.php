<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $fillable = [
        'state'
    ];

    public $timestamps = false;

    public function tickets()
    {
        return $this->HasMany('App\Ticket');
    }
}
