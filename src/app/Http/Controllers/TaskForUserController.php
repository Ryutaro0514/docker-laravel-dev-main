<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskForUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::get();
        return view("user.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required"
        ], [
            "title.required" => "タイトルが未入力です"
        ]);
        // dd($request->description?$request->description:null);

        Task::query()->create([
            "title" => $request->title,
            "description" => $request->description ? $request->description : null,
            "author_id" => Auth::id()
        ]);
        return redirect(route("user.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view("user.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required"
        ], [
            "title.required" => "タイトルが未入力です"
        ]);
        $task = Task::find($id);
        $task->update([
            "title" => $request->title,
            "description" => $request->description ? $request->description : null,
            "completed" => $request->completed
        ]);
        return redirect(route("user.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect(route("user.index"));
    }

    public function complete(string $id)
    {
        $task = Task::find($id);
        $task->update([
            "completed" => !$task->completed
        ]);
        return redirect(route("user.index"));
    }
}
