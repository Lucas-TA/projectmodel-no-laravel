<?php

namespace application\controllers;

class Home
{
    public function index($parts): array
    {
        $users = fetchAll('users');
        return [
          'view' => 'home.php',
            'data' => [
                'title' => 'Home',
                'users' => $users
            ]
        ];
    }
}