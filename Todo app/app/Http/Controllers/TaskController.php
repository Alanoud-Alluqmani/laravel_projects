<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Models\Task; 


class TaskController extends Controller
{
    // Method to show all tasks
    public function index()
    {
        $tasks = Task::all(); // Fetches all tasks from the database
        return view('tasks.index', compact('tasks')); // Returns the 'tasks.index' view with the list of tasks
    }

    // Method to store a new task
    public function store(Request $request)
    {
        $request->validate([ // Validates the request data
            'title' => 'required', // Ensures the 'title' field is required
        ]);

        Task::create(['title' => $request->title]); // Creates a new task in the database using the title provided

        return redirect()->route('tasks.index'); // Redirects to the index page
    }

    // Method to update an existing task
    public function update(Request $request, Task $task)
    {
        $request->validate([ // Validates the updated data
            'title' => 'required', // Ensures the 'title' field is required
        ]);

        $task->update(['title' => $request->title]); // Updates the task's title in the database
        return redirect()->route('tasks.index'); // Redirects to the index page
    }

    // Method to delete a task
    public function delete(Task $task)
    {
        $task->delete(); // Deletes the specified task from the database
        return redirect()->route('tasks.index'); // Redirects to the index page 
    }
}