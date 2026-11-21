<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::with(['project', 'comments'])->get();
        return TaskResource::collection($task);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return (new TaskResource($task))->response()->setStatusCode(201);
    }

    public function show(Task $task)
    {
        $task->load(['project', 'comments']);
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->load(['project', 'comments']);
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}
