<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(CreateTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Sarcina a fost adăugată cu succes!');
    }

    public function index()
    {
        $tasks = Task::with('category')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all(); // Poți optimiza dacă ai multe categorii
        return view('tasks.edit', compact('task', 'categories'));
    }

    // Update method
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Sarcina a fost actualizată cu succes!');
    }

    // Delete method
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Sarcina a fost ștearsă cu succes!');
    }
}
