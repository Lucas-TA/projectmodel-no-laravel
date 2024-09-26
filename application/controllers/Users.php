<?php
namespace application\controllers;

class Users
{
    public function index()
    {
        $users = fetchAll('users', 'id,firstName,lastName');
        echo json_encode($users);
    }
}