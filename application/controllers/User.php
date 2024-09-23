<?php
namespace application\controllers;

class User
{
    public function show($parts)
    {
        if (!isset($parts['user'])) {
            return redirect('/');
        }
        $user = findBy('users', 'id', $parts['user']);
        var_dump($user);
        die();
    }
    public function create(): array
    {
        return [
            'view' => 'create.php',
            'data' => [
                'title' => 'Create Account'
            ]
        ];
    }
    public function store()
    {
        $validate = validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|maxlen:10'
        ]);

        if (!$validate)
        {
            return redirect('/user/create');
        }
        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $created = create('users', $validate);

        if (!$created) {
            setFlash('error', 'There was an error creating the user. Try again in a few minutes.');
            return redirect('/user/create');
        }
        return redirect('/');
    }
}