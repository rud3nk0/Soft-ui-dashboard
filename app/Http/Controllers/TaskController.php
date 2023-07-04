<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
    return view('task.task', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = Task::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'status_id' => $request->status_id,
        ]);

        $tasks = Task::all();
        return view('task.task', ['tasks'=>$tasks]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $TaskId = Task::where('id', $id)->first();

        if($TaskId) {
            $TaskId->name = $request->name;
            $TaskId->user_id = $request->user_id;
            $TaskId->status_id = $request->status_id;
            $TaskId->save();
        }

        $tasks = Task::all();
        return view('task.task', ['tasks'=>$tasks]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task){
            $task->delete();
        }

        $tasks = Task::all();
        return view('task.task', ['tasks'=>$tasks]);
    }
}
