<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="/assets/css/styles.css">
    </head>
    <body>
        <h2><?php echo $name; ?></h2>

        <div class="container users-box">
            <?php require VIEWS.$view; ?>
        </div>
    </body>
</html>
