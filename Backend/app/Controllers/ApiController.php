<?php

namespace App\Controllers;

use App\Models\User;
use PDO;

class ApiController {
    public function getUsers() {
        $users = (new User())->getAll();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function getUser($id) {
        $user = (new User())->getById($id);
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function createUser() {
        $data = json_decode(file_get_contents('php://input'), true);
        $user = new User();
        $user->create($data);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'User created']);
    }

    public function updateUser($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $user = new User();
        $user->update($id, $data);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'User updated']);
    }

    public function deleteUser($id) {
        $user = new User();
        $user->delete($id);
        header('Content-Type: application/json');
        echo json_encode(['status' => 'User deleted']);
    }
}