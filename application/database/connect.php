<?php
function connect(): PDO
{
    return new PDO(dsn: "mysql:host=localhost;dbname=php_estruturado", username: "lucas", password: "123123",
    options: [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ]);
}