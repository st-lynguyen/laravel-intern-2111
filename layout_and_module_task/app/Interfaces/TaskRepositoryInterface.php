<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function getAllTasks();
    public function getTaskById($taskId);
    public function createTask(array $taskDetails);
    public function updateTask($taskId, array $newDetails);
    public function deleteTask($taskId);
}

?>