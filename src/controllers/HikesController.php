<?php
declare(strict_types=1);


class HikesController
{
    private Hike $singleHike;

    public function __construct()
    {
        $this->singleHike = new Hike();
    }

    public function index(): void
    {
        $hikes = $this->singleHike->findAll();

        include '../views/header.view.php';
        include '../views/index.view.php';
        include '../views/footer.view.php';
    }

    public function show(string $id): void
    {
        if (empty($id)) {
           throw new Exception("Hike id was not provided.");
        }

        $hike = $this->singleHike->find($id);

        var_dump($hike);

        include '../views/header.view.php';
        include '../views/singleHike.view.php';
        include '../views/footer.view.php';
    }
}