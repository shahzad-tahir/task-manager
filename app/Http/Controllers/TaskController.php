<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('tasks.create', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'project_id' => 'exists:projects,id',
            'priority' => 'required'
        ]);

        Task::create($request->only([
            'name',
            'project_id',
            'priority'
        ]));

        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        return view('tasks.edit', [
            'task' => Task::findOrFail($id),
            'projects' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'project_id' => 'exists:projects,id',
            'priority' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->update($request->only([
            'name',
            'project_id',
            'priority'
        ]));

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('dashboard');
    }

    /**
     * Reorder given task with its priority
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePriority(Request $request): JsonResponse
    {
        Task::reorderTasks($request->task_id, $request->updated_priority);

        return response()->json('success');
    }
}
