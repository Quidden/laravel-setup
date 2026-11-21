<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index(Task $task)
    {
        return CommentResource::collection(
            $task->comments()->get()
        );
    }

    public function store(StoreCommentRequest $request, Task $task)
    {
        $comment = $task->comments()->create(
            $request->validated()
        );

        return (new CommentResource($comment))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => ['sometimes', 'required', 'string'],
        ]);
        $comment->update($validated);
        return new CommentResource($comment->refresh());
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }
}

