<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')->get();

        return view('admin.tasks.index')->with('tasks', $tasks);
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
    public function store(TaskRequest $request)
    {
        DB::table('tasks')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'assignee' => $request->assignee,
            'estimate' => $request->estimate,
            'actual' => $request->actual
        ]);

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
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('admin.tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();

        return view('admin.tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        DB::table('tasks')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'assignee' => $request->assignee,
            'estimate' => $request->estimate,
            'actual' => $request->actual
        ]);

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
        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->route('tasks.index');
    }

    public function practice()
    {
        // Get all tasks 
        $tasks = DB::table('tasks')->get();

        // Get a data of tasks
        $task = DB::table('tasks')->where('id', '=', '1')->get();
       
        // Chunk results the tasks
        DB::table('tasks')->orderBy('id')->chunk(50, function ($tasks) {
            foreach ($tasks as $task) {
                return dd($task->title);
            }
        });

        // Count record 
        $count = DB::table('tasks')->get()->count();

        // Select data of tasks
        $tasks = DB::table('tasks')->select('title', 'description')->get();

        // // Where query
        $tasks = DB::table('tasks')->where('estimate', '<', '3')->get();

        // Join table
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.assignee')
            ->where('actual', '<', '3')
            ->get();

        // Union query
        $first = DB::table('users')->select('name');
        $tasks = DB::table('tasks')
            ->select('description')
            ->union($first)
            ->get();

        // Check data exists
        $userExists = DB::table('users')->where('email', '=', 'ali82@example.com')->exists();
        if ($userExists == true) {
            dd("User tồn tại");
        }
        dd("User không tồn tại");
    }
}
