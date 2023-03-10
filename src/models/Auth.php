<?php

class Auth extends Database
{
    public function findAll(): array|false
    {
        try {
            return $this->query(
                'SELECT * FROM Users'
            )->fetchAll();

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }
    public function create(string $firstname, string $lastname, string $nickname, string $email, string $password, int $id): void
    {
        if (!$this->query(
            "INSERT INTO Users(`ID`, `firstname`, `lastname`, `nickname`, `email`, `password`, `isAdmin`) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $id,
                $firstname,
                $lastname,
                $nickname,
                $email,
                $password,
                0
            ]
        )) {
            throw new Exception('Error during registration.');
        }
    }

    public function update(string $firstname, string $lastname, string $nickname, string $email, string $password): void
    {
        if (!$this->query(
            "UPDATE Users SET `firstname`= ?, `lastname`= ?, `nickname`= ?, `email`= ?, `password`= ? WHERE ID = ?",
            [
                $firstname,
                $lastname,
                $nickname,
                $email,
                $password,
                $_SESSION["user"]["id"]
            ]
        )) {
            throw new Exception('Error during registration.');
        }
    }

    public function find(string $nickname): array
    {
        if (!$user = $this->query(
            "SELECT * FROM Users WHERE nickname = ?",
            [
                $nickname,
            ]
        )->fetch()) {
            throw new Exception('Failed login attempt : connection error.');
        }

        return $user;
    }

    public function removeUser($id)
    {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "DELETE FROM Users WHERE ID = ?",
            [
                $id,
            ]
        )) {
            throw new Exception('Error during hike deletion.');
        }
    }
}