<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $table = 'work_times';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function modul()
    {
        return $this->belongsTo(Modul::class, 'modul_id');
    }

    /**
     * calculate cost for single work entry
     * $this->employee->hour_cost * $this->hours
     */

    public function getCostAttribute()
    {
        return round(($this->hours * $this->employee->hour_cost), 2);
    }
}
