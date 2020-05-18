<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $primaryKey = 'state_id';

    public function tickets()
    {
        return $this->HasMany('App\Ticket', 'state_id');
    }
}
