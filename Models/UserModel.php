<?php

namespace Models;

class UserModel
{
    public function __construct(private \PDO $db)
    {
    }

    public function getAllUsers(): bool|array
    {
        return $this->db->query('SELECT * FROM users')->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addUser(string $name, ?int $age, string $gender): void
    {
        $query = $this->db->prepare('INSERT INTO users (name, age, gender) VALUES (?, ?, ?)');
        $query->execute([$name, $age, $gender]);
    }
}