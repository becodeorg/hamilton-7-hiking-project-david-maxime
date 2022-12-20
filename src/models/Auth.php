<?php

class Auth extends Database
{
    public function create(string $firstname, string $lastname, string $nickname, string $email, string $password): void
    {
        if (!$this->query(
            "INSERT INTO Users(`ID`, `firstname`, `lastname`, `nickname`, `email`, `password`, `isAdmin`) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                rand(0, 1000000000),
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
                827836616
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
}