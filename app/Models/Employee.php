<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'emp_id');
    }

    public function getHourCostAttribute()
    {
        return round($this->salary / (30 * 8), 2);
    }
}
