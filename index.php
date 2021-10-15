<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lenny Louis</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <main>
            <ul class="list">
                <?php
                $dirs = array_filter(glob('*'), 'is_dir');
                foreach ($dirs as $dir) {
                    if($dir!="tmp" && $dir!="assets"){?>
                        <li class="dir"><a href="<?= $dir ?>/index.php"><img class="img" src="assets/img/<?= $dir ?>.png" alt="" /><h2><?= $dir ?></h2></a></li>
                    <?php }
                }
                ?>
            </ul>
        </main>
    </body>
</html>
