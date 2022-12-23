<?php

require "Database.php";
class Hike extends Database
{
    public function findAll(): array|false
    {
        try {
            return $this->query(
                'SELECT * FROM Hikes'
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
                "SELECT * FROM Hikes WHERE ID = ?",
                [
                    $id
                ]
            )->fetch();

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function createHike(string $name, int $distance, int $duration, int $elevation, string $description, array $tags)
    {
        $this->query('SET foreign_key_checks = 0');
        $hikeID = rand(0, 1000000000);
        if (!$this->query(
            "INSERT INTO Hikes(`ID`, `name`, `date_of_creation`, `distance`, `duration`, `elevation_gain`, `description`, `UserID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $hikeID,
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
        foreach($tags as $tag)
        {
            $this->query("INSERT INTO HikesTags (`HikesID`,`TagsID`) SELECT (SELECT ID FROM Hikes WHERE ID = ?), (SELECT ID FROM Tags WHERE name = ?)",
                [
                    $hikeID,
                    $tag
                ]
            );
        }
    }

    public function modifyHike(string $name, int $distance, int $duration, int $elevation, string $description, $id, array $tags)
    {
        if($_SESSION['user']['isAdmin'] === 0) {
        $this->query('SET foreign_key_checks = 0');
        if (!$this->query(
            "UPDATE Hikes SET `name`= ?, `distance`= ?, `duration` = ?, `elevation_gain` = ?, `description` = ?, updateTime = ?) WHERE ID = ? AND UserID= ?",
            [
                $name,
                $distance,
                $duration,
                $elevation,
                $description,
                date("Y-m-d"),
                $id,
                $_SESSION["user"]["id"]
            ]
        )) {
            throw new Exception('Error during hike creation.');
        }}

        if($_SESSION['user']['isAdmin'] === 1) {
            $this->query('SET foreign_key_checks = 0');
            if (!$this->query(
                "UPDATE Hikes SET `name`= ?, `distance`= ?, `duration` = ?, `elevation_gain` = ?, `description` = ?, updateTime = ? WHERE ID = ?",
                [
                    $name,
                    $distance,
                    $duration,
                    $elevation,
                    $description,
                    date("Y-m-d"),
                    $id
                ]
            )) {
                throw new Exception('Error during hike creation.');
            }}
            $this->query("DELETE FROM HikesTags WHERE HikesID = ?", [$id]);
            foreach($tags as $tag)
            {
                $this->query("INSERT INTO HikesTags (`HikesID`,`TagsID`) SELECT (SELECT ID FROM Hikes WHERE ID = ?), (SELECT ID FROM Tags WHERE name = ?)",
                    [
                        $id,
                        $tag
                    ]
                );
            }
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
        try{
            return $this->query("SELECT H.*
                            FROM Hikes H
                            JOIN HikesTags HT
                              ON H.ID = HT.HikesID
                            JOIN Tags T
                              ON T.ID = HT.TagsID WHERE T.name = ?", [$tagName])
                ->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }return [];
        }

}