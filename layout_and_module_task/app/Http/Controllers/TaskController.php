<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class TaskController extends Controller
{
    private $taskRepository;
    private $userRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, UserRepositoryInterface $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();

        return view('admin.tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepository->getUsers(['id','name']);

        return view('admin.tasks.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $this->taskRepository->createTask($request->validated());

        return back()->with('success', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->taskRepository->getTaskById($id);

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
        $task = $this->taskRepository->getTaskById($id);
        $users = $this->userRepository->getUsers(['id', 'name']);

        return view('admin.tasks.edit', ['task' => $task, 'users' => $users]);
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
        $this->taskRepository->updateTask($id, $request->validated());

        return back()->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->taskRepository->deleteTask($id);

        return back()->with('success', 'Delete Successfully');
    }

    // public function practice()
    // {
    //     // Get all tasks 
    //     $tasks = DB::table('tasks')->get();

    //     // Get a data of tasks
    //     $task = DB::table('tasks')->where('id', '=', '1')->first();

    //     // Chunk results the tasks
    //     DB::table('tasks')->orderBy('id')->chunk(50, function ($tasks) {
    //         foreach ($tasks as $task) {
    //             return dd($task->title);
    //         }
    //     });

    //     // Count record 
    //     $count = DB::table('tasks')->count();

    //     // Select data of tasks
    //     $tasks = DB::table('tasks')->select('title', 'description')->get();

    //     // // Where query
    //     $tasks = DB::table('tasks')->where('estimate', '<', '3')->get();

    //     // Join table
    //     $tasks = DB::table('users')
    //         ->join('tasks', 'users.id', '=', 'tasks.assignee')
    //         ->where('actual', '<', '3')
    //         ->get();

    //     // Union query
    //     $first = DB::table('users')->select('name');
    //     $tasks = DB::table('tasks')
    //         ->select('description')
    //         ->union($first)
    //         ->get();

    //     // Check data exists
    //     $userExists = DB::table('users')->where('email', '=', 'ali82@example.com')->exists();
    //     if ($userExists == true) {
    //         dd("User t???n t???i");
    //     }
    //     dd("User kh??ng t???n t???i");
    // }
}
