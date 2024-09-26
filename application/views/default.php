<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $title = 'Site';
            echo $this->e($title); ?></title>
        <link rel="stylesheet" href="/assets/css/styles.css">
    </head>
    <body>
        <div class="header container">
            <?=$this->insert('partials/header')?>
        </div>
        <div class="container users-box">
            <?=$this->section('content')?>
        </div>
        <?=$this->section('scripts')?>
    </body>
</html>
