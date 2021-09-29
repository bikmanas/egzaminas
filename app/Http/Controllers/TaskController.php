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
    public function index(Request $request)
    {
        if (isset($request->status_id) && $request->status_id !== 0){
        $tasks = \App\Models\Task::where('status_id', $request->status_id)->orderBy('id', 'desc')->get();
        }
    else{
        $tasks = \App\Models\Task::orderBy('id', 'desc')->get();
    }
        
        $statuses = \App\Models\Status::orderBy('name')->get();

    foreach ($tasks as $task) {
        $status_name = \App\Models\Status::find($task -> status_id);
        $task -> status_id = $status_name->name;
    }
    return view('tasks.index', ['tasks' => $tasks, 'statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = \App\Models\Status::orderBy('name')->get();
        return view('tasks.create', ['statuses' => $statuses]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');

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
        $statuses = \App\Models\Status::orderBy('name')->get();
        return view('tasks.edit', ['task' => $task, 'statuses' => $statuses]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->fill($request->all());
        if($request -> status_id == 6){
            $task -> completed_date = date('Y-m-d H:i:s');
        }
        $task->save();
        return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');

    }
}
