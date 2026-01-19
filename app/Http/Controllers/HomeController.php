<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\WorkTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    public function getEmployees($id)
    {
        $employees = WorkTime::with('employee')->where('project_id', $id)->get();

        $employeesData = $employees->map(function ($workTime) {
            return [
                'id'        => $workTime->employee->id,
                'name'      => $workTime->employee->name,
                'salary'    => $workTime->employee->salary,
                'hour_cost' => $workTime->employee->hour_cost
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => $employeesData
        ]);
    }
}
