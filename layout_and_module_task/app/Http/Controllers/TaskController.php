<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = [
            'id' => 1,
            'title' => 'Task_1',
            'description' => 'php exercises',
            'type' => 'Basic',
            'status' => 'complete',
            'start_date' => '2021-12-08',
            'due_date' => '2021-12-18',
            'assignee' => 'Ly',
            'estimate' => '2 days',
            'actual' => '3 days'
        ];

        return view('admin.tasks')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = [
            'id' => $id,
            'title' => 'Task_1',
            'description' => 'php exercises',
            'type' => 'Basic',
            'status' => 'complete',
            'start_date' => '2021-12-08',
            'due_date' => '2021-12-18',
            'assignee' => 'Ly',
            'estimate' => '2 days',
            'actual' => '3 days'
        ];

        return view('admin.tasks.show')->with('list', $list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = [
            'id' => $id,
            'title' => 'Task_1',
            'description' => 'php exercises',
            'type' => 'Basic',
            'status' => 'complete',
            'start_date' => '2021-12-08',
            'due_date' => '2021-12-18',
            'assignee' => 'Ly',
            'estimate' => '2 days',
            'actual' => '3 days'
        ];

        return view('admin.tasks.edit')->with('list', $list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, $id)
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('tasks.index');
    }
}
