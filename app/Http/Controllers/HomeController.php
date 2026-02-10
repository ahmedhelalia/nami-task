<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Modul;
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

    public function getData(Request $request)
    {
        $id = $request->input('project_id');

        $isFiltering = $id && $id !== 'all';

        $employees = Employee::when($isFiltering, function ($query) use ($id) {
            $query->whereHas('workTimes', fn($q) => $q->where('project_id', $id));
        })->get();

        /** employees */
        $employeesData = $employees->map(function ($employee) {
            return [
                'id'        => $employee->id,
                'name'      => $employee->name,
                'salary'    => $employee->salary,
                'hour_cost' => $employee->hour_cost
            ];
        });

        /** projects */
        $projects = Project::with('workTimes')
            ->when($isFiltering, fn($q) => $q->where('id', $id))
            ->get();

        $projectsData = $projects->map(function ($project) {

            $dates = $project->workTimes->pluck('date')->unique()->sort();

            return  [
                'id'   => $project->id,
                'name' => $project->name,
                'total_employees' => $project->employee_count,
                'total_cost'      => round($project->total_cost, 2),
                'start_date'      => $dates->first(),
                'end_date'        => $dates->last(),
                'total_days'      => $dates->count()
            ];
        });


        /** time logs */
        $workTimes = WorkTime::with('employee', 'project', 'modul')
            ->when($isFiltering, fn($q) => $q->where('project_id', $id))
            ->get();

        $timeLogs = $workTimes->map(function ($workTime) {
            return [
                'id' => $workTime->id,
                'date' => $workTime->date,
                'employee' => $workTime->employee->name ?? 'N/A',
                'project'  => $workTime->project->name ?? 'N/A',
                'modul'    => $workTime->modul->name ?? 'N/A',
                'hours'    => $workTime->hours,
            ];
        });

        /** moduls  */
        $modules = Modul::when($isFiltering, function ($q) use ($id) {
            $q->whereHas('workTimes', fn($sq) => $sq->where('project_id', $id));
        })
            ->with(['workTimes' => function ($q) use ($id, $isFiltering) {
                $q->when($isFiltering, fn($sq) => $sq->where('project_id', $id))
                    ->with('employee', 'project');
            }])
            ->get();

        $modulsData = $modules->flatMap(function ($module) {
            return $module->workTimes->map(function ($workTime) use ($module) {
                return [
                    'emp_name'     => $workTime->employee->name ?? 'N/A',
                    'name'         => $module->name,
                    'project_name' => $workTime->project->name ?? 'N/A',
                    'hours'        => $workTime->hours
                ];
            });
        });

        return response()->json([
            'success' => true,
            'employees' => $employeesData,
            'projects'  => $projectsData,
            'timeLogs'  => $timeLogs,
            'moduls'    => $modulsData
        ]);
    }
}
