<?php
declare(strict_types=1);


class AuthController
{
    private Auth $authModel;

    public function __construct()
    {
        $this->authModel = new Auth();
    }

    public function register(array $input): void
    {
        if (empty($input['firstname']) || empty($input['email']) || empty($input['password'])) {
            throw new Exception('Form data not validated.');
        }

        $firstname = htmlspecialchars($input['firstname']);
        $lastname = htmlspecialchars($input['lastname']);
        $nickname = htmlspecialchars($input['nickname']);
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($input['password'], PASSWORD_DEFAULT);

        $this->authModel->create($firstname, $lastname, $nickname, $email, $password);

        $id = $this->authModel->getLastInsertId();


        $_SESSION['user'] = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'nickname' => $nickname,
            'email' => $email
        ];

        http_response_code(302);
        header('location: /');
    }

    public function updateProfile(array $input)
    {
        if (empty($input['firstname']) || empty($input['email']) || empty($input['password'])) {
            throw new Exception('Form data not validated.');
        }

        $firstname = htmlspecialchars($input['firstname']);
        $lastname = htmlspecialchars($input['lastname']);
        $nickname = htmlspecialchars($input['nickname']);
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($input['password'], PASSWORD_DEFAULT);
        $id = 827836616;

        $this->authModel->update($firstname, $lastname, $nickname, $email, $password);


        $_SESSION['user'] = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'nickname' => $nickname,
            'email' => $email
        ];

        http_response_code(302);
        header('location: /');
    }

    public function showRegistrationForm(): void
    {
        include '../views/header.view.php';
        include '../views/registration.view.php';
        include '../views/footer.view.php';
    }

    public function showUpdateProfile(): void
    {
        include '../views/header.view.php';
        include '../views/updateProfile.view.php';
        include '../views/footer.view.php';
    }

    public function login(array $input)
    {
        if (empty($input) || empty($input['nickname']) || empty($input['password'])) {
            throw new Exception('Form data not validated.');
        }

        // Sanitize/validate input
        $username = htmlspecialchars($input['nickname']);
        $password = htmlspecialchars($input['password']);

        $user = $this->authModel->find($username);

        if (!password_verify($password, $user['password'])) {
            throw new Exception("Failed login attempt : wrong password");
        }

        $_SESSION['user'] = [
            "id" => $user["ID"],
            'username' => $user['nickname'],
            'email' => $user['email'],
            'isLogged' => true
        ];

        // Then, we redirect to the home page
        http_response_code(302);
        header('location: /');
    }

    public function showLoginForm()
    {
        include 'views/includes/header.view.php';
        include 'views/login.view.php';
        include 'views/includes/footer.view.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header('location: /');
    }
}