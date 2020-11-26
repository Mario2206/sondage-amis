<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>

<body>
    <h1>Vous pouvez changer ici vos informations</h1>
    <form action="<?= MAIN_PATH . "/register" ?>" method="post">
        <h2 class="text-center">Inscription</h2>
        <div class="form-group">
            <input type="text" name="firstName" class="form-control" placeholder="First name" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="lastName" class="form-control" placeholder="Last name" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name="password-retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Valider les changements</button>
        </div>
    </form>
</body>

</html>