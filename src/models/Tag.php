<?php

class Tag extends Database
{
    public function findAll(): array|false
    {
        try {
            return $this->query(
                'SELECT * FROM Tags'
            )->fetchAll();

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function removeTag($id)
    {
        if (!$this->query(
            "DELETE FROM Tags WHERE ID = ?",
            [
                $id,
            ]
        )) {
            throw new Exception('Error during tag deletion.');
        }
    }

    public function createTag($name)
    {
        if (!$this->query(
            "INSERT INTO Tags(`ID`, `name`) VALUES (?, ?)",
            [
                rand(0, 1000000000),
                $name
            ]
        )) {
            throw new Exception('Error during hike creation.');
        }
    }
}