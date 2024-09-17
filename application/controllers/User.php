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
    public function create()
    {
        var_dump('create');
    }
}