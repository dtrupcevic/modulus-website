<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = 'recruitment';

    public $timestamps = false;

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function class()
    {
        return $this->belongsTo(PlayerClass::class, 'class_id');
    }

    public function priority()
    {
        return $this->belongsTo(RecruitmentPriority::class, 'priority_id');
    }
}
