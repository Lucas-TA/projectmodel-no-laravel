<?php
namespace application\controllers;

class Login
{
    public function index(): array
    {
        $users = fetchAll('users');
        return [
            'view' => 'login.php',
            'data' => [
                'title' => 'Login',
            ]
        ];
    }
    public function store(): null
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if (empty($email) || empty($password)) {
            return setMessageAndRedirect('message', 'Invalid email or password', '/login');
        }
        $user = findBy('users', 'email', $email);

        if (empty($user)) {
            return setMessageAndRedirect('message', 'Invalid email or password', '/login');
        }
        if (!password_verify($password, $user->password)) {
            return setMessageAndRedirect('message', 'Invalid email or password', '/login');
        }
        $_SESSION[LOGGED] = $user;
        return redirect('/');
    }
    public function destroy(): null
    {
        unset($_SESSION[LOGGED]);
        return redirect('/');
    }
}