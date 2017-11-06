<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentPriority extends Model
{
    protected $table = 'recruitment_priority';

    public $timestamps = false;

    public function recruitment()
    {
        return $this->hasMany(Recruitment::class, 'priority_id');
    }
}
