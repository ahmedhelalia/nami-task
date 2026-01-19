<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class, 'project_id');
    }

    /**
     * get total cost foreach project
     * total cost will equal working time hours for the project * hour_cost
     */
    public function getTotalCostAttribute()
    {
        return $this->workTimes()
            ->with('employee')
            ->get()
            ->sum(function ($workTime) {
                return $workTime->hours * $workTime->employee->hour_cost;
            });
    }

    /**
     * count employees for each project
     */
    public function getEmployeeCountAttribute()
    {
        return $this->workTimes()
            ->distinct('emp_id')
            ->count();
    }
}
