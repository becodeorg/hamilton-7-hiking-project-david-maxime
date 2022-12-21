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
                'SELECT * FROM Hikes WHERE UserID = ?',
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

    public function createHike(string $name, int $distance, int $duration, int $elevation, string $description, string $tag)
    {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "INSERT INTO Hikes(`ID`, `name`, `date_of_creation`, `distance`, `duration`, `elevation_gain`, `description`, `UserID`, `TagName`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                rand(0, 1000000000),
                $name,
                date("Y-m-d"),
                $distance,
                $duration,
                $elevation,
                $description,
                $_SESSION["user"]["id"],
                $tag
            ]
        )) {
            throw new Exception('Error during hike creation.');
        }
    }

    public function modifyHike(string $name, int $distance, int $duration, int $elevation, string $description, $id, string $tag)
    {
        if($_SESSION['user']['isAdmin'] === 0) {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "UPDATE Hikes SET `name`= ?, `distance`= ?, `duration` = ?, `elevation_gain` = ?, `description` = ?, updateTime = ?, TagName = ? WHERE ID = ? AND UserID= ?",
            [
                $name,
                $distance,
                $duration,
                $elevation,
                $description,
                date("Y-m-d"),
                $tag,
                $id,
                $_SESSION["user"]["id"]
            ]
        )) {
            throw new Exception('Error during hike creation.');
        }}

        if($_SESSION['user']['isAdmin'] === 1) {
            $this->query('SET foreign_key_checks = 0');
            if (!$this->query(
                "UPDATE Hikes SET `name`= ?, `distance`= ?, `duration` = ?, `elevation_gain` = ?, `description` = ?, updateTime = ?, TagName = ? WHERE ID = ?",
                [
                    $name,
                    $distance,
                    $duration,
                    $elevation,
                    $description,
                    date("Y-m-d"),
                    $tag,
                    $id
                ]
            )) {
                throw new Exception('Error during hike creation.');
            }}

    }

    public function removeHike($id)
    {
        if($_SESSION['user']['isAdmin'] === 0) {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "DELETE FROM Hikes WHERE ID = ? AND UserID= ?",
            [
                $id,
                $_SESSION["user"]["id"]
            ]
        )) {
            throw new Exception('Error during hike deletion.');
        }
        }

        if($_SESSION['user']['isAdmin'] === 1) {
            $this->query('SET foreign_key_checks = 0');
            if (!$this->query(
                "DELETE FROM Hikes WHERE ID = ?",
                [
                    $id,
                ]
            )) {
                throw new Exception('Error during hike deletion.');
            }
        }
    }

    public function findByTag(string $tagName)
    {
        try {
            return $this->query(
                "SELECT * FROM Hikes WHERE TagName = ?",
                [
                    $tagName
                ]
            )->fetchAll();

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }
}