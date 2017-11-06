<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'nickname',
        'class_id',
        'specialization_id',
        'battletag',
        'armory_url',
        'warcraftlogs_url',
        'about',
        'experience',
        'previous_guild',
        'expectations_from_guild',
        'can_attend'
    ];

    public function class()
    {
        return $this->belongsTo(PlayerClass::class, 'class_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'handled_by_user');
    }
}
