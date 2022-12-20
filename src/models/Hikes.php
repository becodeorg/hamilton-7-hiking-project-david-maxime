<?php

require "Database.php";
class Hike extends Database
{
    public function findAll(): array|false
    {
        try {
            return $this->query(
                'SELECT name, ID FROM Hikes'
            )->fetchAll();

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function find(string $id): array|false
    {
        try {
            return $this->query(
                "SELECT name FROM Hikes WHERE ID = ?",
                [
                    $id
                ]
            )->fetch();

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }
}