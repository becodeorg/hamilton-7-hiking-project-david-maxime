<?php

class TagsController
{
    private Tag $tagModel;

    public function __construct()
    {
        $this->tagModel = new Tag();
    }

    public function indexAdmin()
    {
        $tags = $this->tagModel->findAll();


        include '../views/header.view.php';
        include '../views/adminTags.view.php';
        include '../views/footer.view.php';
    }

    public function deleteTag($input)
    {
        $id = $input['id'];
        $this->tagModel->removeTag($id);

        http_response_code(302);
        header('location: /tagsList');
    }

    public function showAddForm(): void
    {
        include '../views/header.view.php';
        include '../views/addTag.view.php';
        include '../views/footer.view.php';
    }

    public function addTag($input)
    {
        if (empty($input) || empty($input['name']) ) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $tagName = $input['name'];


        $this->tagModel->createTag($tagName);


        // Then, we redirect to the home page

        http_response_code(302);
        header('location: /tagsList');
    }

    public function addTagFromCreateForm($input)
    {
        if (empty($input) || empty($input['name']) ) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $tagName = $input['tagName'];


        $this->tagModel->createTag($tagName);
    }
}