<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = [
        'nickname',
        'class_id',
        'specialization_id',
        'rank_id',
        'flavor',
        'description',
        'armory_url',
        'warcraftlogs_url'
    ];

    public function class()
    {
        return $this->belongsTo(PlayerClass::class, 'class_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }
}
