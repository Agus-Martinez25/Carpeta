<?php

namespace App\Models;

use PDO;

class User {
    private $db;

    public function __construct() {
        $config = require '../config/database.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['password']);
    }

    public function getAll() {
        $statement = $this->db->query('SELECT * FROM users');
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $statement = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $statement = $this->db->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
        $statement->execute([$data['name'], $data['email']]);
    }

    public function update($id, $data) {
        $statement = $this->db->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
        $statement->execute([$data['name'], $data['email'], $id]);
    }

    public function delete($id) {
        $statement = $this->db->prepare('DELETE FROM users WHERE id = ?');
        $statement->execute([$id]);
    }
}