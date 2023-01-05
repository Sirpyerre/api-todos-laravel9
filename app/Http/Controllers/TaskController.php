<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() 
    {
        return "Hello word: from controller";
    }

    public function create(Request $request) 
    {
        $request->validate([
            'title' => 'required|max:20|min:3'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Your todo was created']);
    }

    public function getTask(int $id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['message' => "Task #$id not found"]);    
        }

        return response()->json(['task' => $task]);
    }

    public function all()
    {
        $task = Task::all();

        return response()->json(['task' => $task]);
    }

    public function edit(int $id, Request $request) 
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['message' => "Task #$id not found"]);    
        }

        $request->validate([
            'title' => 'max:20|min:3'
        ]);

        $task->update($request->all());

        return response()->json(['message' => 'Your todo was updated']);
    }

    public function delete(int $id) 
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['message' => "Task #$id not found"]);    
        }

        $task->delete();

        return response()->json(['message' => 'Your task was deleted']);
    }

    public function completed(int $id) 
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['message' => "Task #$id not found"]);    
        }

        $task->completed = 1;
        $task->save();

        return response()->json(['message' => 'Your task was completed']);
    }
}
