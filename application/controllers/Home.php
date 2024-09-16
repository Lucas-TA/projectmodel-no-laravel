<?php

namespace application\controllers;

class Home
{
    public function index($parts): array
    {
        return [
          'view' => 'home.php',
            'data' => [
                'name' => 'Lucas',
                'title' => 'Home'
            ]
        ];
    }
}