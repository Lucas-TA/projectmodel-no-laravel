<?php

require 'bootstrap.php';
try {
    $data = router();

    extract($data['data']);

    if (!isset($data['data'])) {
        throw new Exception("The indice data is missing");
    }
    if (!isset($data['data']['title'])) {
        throw new Exception("The indice title data is missing");
    }

    if (!isset($data['view'])) {
        throw new Exception("View is not defined");
    }
    if (!file_exists(VIEWS . $data['view'])) {
        throw new Exception("View {$data['view']} does not exist");
    }

    $view = $data['view'];

    require VIEWS . 'default.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}

