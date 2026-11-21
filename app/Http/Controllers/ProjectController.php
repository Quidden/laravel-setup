<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(Project::all());
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());

        return response()->json(['message' => 'Project created successfully']);
    }

    public function show(string $id)
    {
        return response()->json(Project::find($id));
    }

    public function update(UpdateProjectRequest $request, string $id)
    {
        return response()->json(
            Project::find($id)->update($request->validated())
        );
    }

    public function destroy(string $id)
    {
        Project::find($id)->delete();

        return response()->json();
    }
}
