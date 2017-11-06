<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specializations';

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function class()
    {
        return $this->belongsTo(PlayerClass::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
