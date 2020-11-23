<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php foreach($templateStyles as $style) : ?>
       <link rel="stylesheet" href="<?= MAIN_PATH ?> .'style/<?=$style?>.css">
    <?php endforeach; ?>
    <title><?= $templateTitle ?></title>
</head>
<body>
    <?= $content ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <?= array_reduce($templateScripts, function ($acc , $script) {
        return $acc .= '<script src="'. MAIN_PATH . 'js/' . $script . '.js"></script>';
    }) 
    ?>
</body>
</html>