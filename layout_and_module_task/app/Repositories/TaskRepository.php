<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function getTaskById($taskId)
    {
        return Task::findOrFail($taskId);
    }

    public function createTask(array $taskDetails)
    {
        return Task::create($taskDetails);
    }

    public function updateTask($taskId, array $newDetails)
    {
        return Task::whereId($taskId)->update($newDetails);
    }

    public function deleteTask($taskId)
    {
        return Task::destroy($taskId);
    }

}

?>