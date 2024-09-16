<?php

use JetBrains\PhpStorm\NoReturn;

function routes():array
{
   return require 'routes.php';
}

/**
 * Return static URI from routes.php
 * @param $uri
 * @param $routes
 * @return array
 */
function getMatchedStaticUri($uri, $routes):array
{
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }
    return [];
}

/**
 * If URI does not match with static URI, it will face it as a dynamic uri.
 * @param $uri
 * @param $routes
 * @return array
 */
function validateRegexDynamicUri($uri, $routes): array
{
    return array_filter(
        $routes,
        callback: function ($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        mode: ARRAY_FILTER_USE_KEY
    );
}

function getDynamicUriParts($uri, $matchedUri):array
{
    if (!empty($matchedUri)) {
        $matchedUriParts = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedUriParts, '/'))
        );
    }
    return [];
}

function formatDynamicUriParts($uri, $parts):array
{
    $partsData = [];
    foreach ($parts as $index => $part) {
        $partsData[$uri[$index - 1]] = $part;
    }
    return $partsData;
}

/**
 * Handles all functions and makes routing works.
 * @return void
 * @throws Exception
 */
function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $matchedUri = getMatchedStaticUri($uri, $routes);

    $parts = [];
    if (empty($matchedUri)) {
        $matchedUri = validateRegexDynamicUri($uri, $routes);
        $uri = explode('/', ltrim($uri, '/'));
        $parts = getDynamicUriParts($uri, $matchedUri);
        $parts = formatDynamicUriParts($uri, $parts);
    }
    if (!empty($matchedUri)) {
        return loadController($matchedUri, $parts);
    }
    throw new Exception('Something went wrong!');
}