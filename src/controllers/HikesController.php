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

    public function showAddHikeForm(): void
    {
        include '../views/header.view.php';
        include '../views/addHike.view.php';
        include '../views/footer.view.php';
    }

    public function showUpdateHikeForm(): void
    {
        include '../views/header.view.php';
        include '../views/updateHike.view.php';
        include '../views/footer.view.php';
    }

    public function addHike(array $input)
    {
        if (empty($input) || empty($input['name']) || empty($input['distance']) || empty($input['duration']) || empty($input['elevation']) || empty($input['description'])) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $hikeName = $input['name'];
        $hikeDistance = intval($input['distance']);
        $hikeDuration = intval($input['duration']);
        $hikeElevation = intval($input['elevation']);
        $hikeDescription = $input['description'];

        $this->singleHike->createHike($hikeName,$hikeDistance,$hikeDuration,$hikeElevation,$hikeDescription);


        // Then, we redirect to the home page
        http_response_code(302);
        header('location: /');
    }

    public function updateHike(array $input)
    {
        if (empty($input) || empty($input['name']) || empty($input['distance']) || empty($input['duration']) || empty($input['elevation']) || empty($input['description'])) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $hikeName = $input['name'];
        $hikeDistance = intval($input['distance']);
        $hikeDuration = intval($input['duration']);
        $hikeElevation = intval($input['elevation']);
        $hikeDescription = $input['description'];

        $this->singleHike->modifyHike($hikeName,$hikeDistance,$hikeDuration,$hikeElevation,$hikeDescription);


        // Then, we redirect to the home page
        http_response_code(302);
        header('location: /');
    }

    public function showMyHikes()
    {
        $hikes = $this->singleHike->findMyHikes();

        include '../views/header.view.php';
        include '../views/myhikes.view.php';
        include '../views/footer.view.php';
    }
}