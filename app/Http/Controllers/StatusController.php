<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('task.status', ['statuses'=>$statuses]);
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
        $statuses = Status::create([
            'name' => $request->name,
            'is_active' => $request->is_active,
            'progress' => $request->progress,
        ]);

        $statuses = Status::all();
        return view('task.status', ['statuses'=>$statuses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $StatusId = Status::where('id', $id)->first();

        if($StatusId) {
            $StatusId->name = $request->name;
            $StatusId->is_active = $request->is_active;
            $StatusId->progress = $request->progress;
            $StatusId->save();
        }

        $statuses = Status::all();
        return view('task.status', ['statuses' => $statuses]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status, $id)
    {
        $status = Status::find($id);
        if ($status){
            $status->delete();
        }

        $statuses = Status::all();
        return view('task.status', ['statuses'=>$statuses]);
    }
}
