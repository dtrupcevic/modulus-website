<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
