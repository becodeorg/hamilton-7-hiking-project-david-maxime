<?php
declare(strict_types=1);


class HikesController
{
    private Hike $singleHike;
    private Tag $tagModel;

    public function __construct()
    {
        $this->singleHike = new Hike();
        $this->tagModel = new Tag();
    }

    public function index(): void
    {
        $hikes = $this->singleHike->findAll();
        $tags = $this->tagModel->findAll();


            include '../views/header.view.php';
            include '../views/index.view.php';
            include '../views/footer.view.php';

    }

    public function indexAdmin():void
    {
        $hikes = $this->singleHike->findAll();

        include '../views/header.view.php';
        include '../views/adminIndex.view.php';
        include '../views/footer.view.php';
    }

    public function showHikesForTag($tagName): void
    {
        $hikes = $this->singleHike->findByTag($tagName);

        include '../views/header.view.php';
        include '../views/indexByTag.view.php';
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
        $tags = $this->tagModel->findAll();
        include '../views/header.view.php';
        include '../views/addHike.view.php';
        include '../views/footer.view.php';
    }

    public function showUpdateHikeForm(): void
    {
        $tags = $this->tagModel->findAll();
        include '../views/header.view.php';
        include '../views/updateHike.view.php';
        include '../views/footer.view.php';
    }

    public function addHike(array $input)
    {
        if (empty($input) || empty($input['name']) || empty($input['distance']) || empty($input['duration']) || empty($input['elevation']) || empty($input['description'])|| empty($input['tags'])) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $hikeName = $input['name'];
        $hikeDistance = intval($input['distance']);
        $hikeDuration = intval($input['duration']);
        $hikeElevation = intval($input['elevation']);
        $hikeDescription = $input['description'];
        $tag= htmlspecialchars($input['tags']);

        $this->singleHike->createHike($hikeName,$hikeDistance,$hikeDuration,$hikeElevation,$hikeDescription, $tag);


        // Then, we redirect to the home page
        http_response_code(302);
        header('location: /');
    }

    public function updateHike(array $input)
    {
        if (empty($input) || empty($input['name']) || empty($input['distance']) || empty($input['duration']) || empty($input['elevation']) || empty($input['description']) || empty($input['id'])|| empty($input['tags'])) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $hikeName = $input['name'];
        $hikeDistance = intval($input['distance']);
        $hikeDuration = intval($input['duration']);
        $hikeElevation = intval($input['elevation']);
        $hikeDescription = $input['description'];
        $id = $input['id'];
        $tag = htmlspecialchars($input['tags']);

        $this->singleHike->modifyHike($hikeName,$hikeDistance,$hikeDuration,$hikeElevation,$hikeDescription, $id, $tag);


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

    public function deleteHike(array $input)
    {
        $id = $input['id'];
        $this->singleHike->removeHike($id);

        http_response_code(302);
        header('location: /');
    }
}