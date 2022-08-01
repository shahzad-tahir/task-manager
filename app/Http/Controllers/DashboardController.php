<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Displays dashboard
     *
     * @return Factory|View|Application
     */
    public function __invoke(): Factory|View|Application
    {
        return view('dashboard', [
            'projects' => Project::orderByDesc('id')->get(),
            'tasks' => Task::with('project')
                ->orderBy('priority')
                ->get()
        ]);
    }
}
