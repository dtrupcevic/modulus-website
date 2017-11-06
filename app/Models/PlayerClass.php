<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerClass extends Model
{
    protected $table = 'classes';

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function specializations()
    {
        return $this->hasMany(Specialization::class, 'class_id');
    }
}
