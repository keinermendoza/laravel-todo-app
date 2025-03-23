<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("todos.index", [
            "todos" => Auth::user()->todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            "task" => ["required", "max:250"],
        ]);

        Todo::create([
            "task" => $attrs["task"],
            "user_id" => Auth::user()->id,
            "completed" => false
        ]);

        return redirect()->route("todos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view("todos.edit", [
            "todo" => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $attrs = $request->validate([
            "task" => ["required", "max:250"],
        ]);

        $todo->update([
            "task" => $attrs["task"],
        ]);

        return redirect()->route("todos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route("todos.index");
    }

    public function toogle(Todo $todo)
    {
        $todo->update(['completed' => !$todo->completed]);
        return redirect()->route("todos.index"); 
    }
}
