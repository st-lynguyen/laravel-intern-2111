<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function getUserById($userId);
    public function getUsers($columns);
    // public function createUser(array $userDetails);
    // public function updateUser($userId, array $newDetails);
    // public function deleteUser($userId);
}
