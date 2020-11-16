<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= MAIN_PATH ?>style/confirm-view.css">
    <title>Confirmation</title>
</head>
<body>
    <div class="container-fluid container-confirm d-flex justify-content-center flex-column align-items-center">
        <div class="alert alert-success">
                <?= $message ?>
        </div>
        <a href="<?= MAIN_PATH ?>poll" class="btn btn-primary">
            Retour aux sondages
        </a>
    </div>
   
</body>
</html>