<?php
/**
 * @throws Exception
 */
function loadController($matchedUri, $parts)
{
    [$controller, $method] = explode('@', array_values($matchedUri)[0]);
    $controllerWithNamespace = CONTROLLERS_PATH.$controller;

    if (!class_exists($controllerWithNamespace)) {
        throw new Exception("Controller $controller does not exists.");
    }
    $controllerInstance = new $controllerWithNamespace();

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("Method $method does not exists.");
    }

    $controller = $controllerInstance->$method($parts);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        die();
    }
    return $controller;
}