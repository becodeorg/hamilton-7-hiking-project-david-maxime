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

    public function findMyHikes(): array|false
    {
        try {
            return $this->query(
                'SELECT name, ID FROM Hikes WHERE UserID = ?',
                [
                    $_SESSION["user"]["id"]
                ]
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

    public function createHike(string $name, int $distance, int $duration, int $elevation, string $description)
    {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "INSERT INTO Hikes(`ID`, `name`, `date_of_creation`, `distance`, `duration`, `elevation_gain`, `description`, `UserID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                rand(0, 1000000000),
                $name,
                date("Y-m-d"),
                $distance,
                $duration,
                $elevation,
                $description,
                $_SESSION["user"]["id"]
            ]
        )) {
            throw new Exception('Error during hike creation.');
        }
    }

    public function modifyHike(string $name, int $distance, int $duration, int $elevation, string $description)
    {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "UPDATE Hikes SET `name`= ?, `distance`= ?, `duration` = ?, `elevation_gain` = ?, `description` = ?, updateTime = ? WHERE UserID = ?",
            [
                $name,
                $distance,
                $duration,
                $elevation,
                $description,
                date("Y-m-d"),
                $_SESSION["user"]["id"]
            ]
        )) {
            throw new Exception('Error during hike creation.');
        }
    }
}