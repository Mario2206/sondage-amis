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
            <div class="form-group">
                <label for="firstName">Votre nom :</label>
                <input type="text" name="firstName" class="form-control" placeholder="First name" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="lastName">Votre prénom :</label>
                <input type="text" name="lastName" class="form-control" placeholder="Last name" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pseudo">Votre pseudo :</label>
                <input type="text" name="pseudo" class="form-control" placeholder="2 to 50 chars" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Votre email :</label>
                <input type="email" name="email" class="form-control" placeholder="10 to 150 chars" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Votre mot de passe :</label>
                <input type="password" name="password" class="form-control" placeholder="10 to 150 chars" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password-retype">Votre mot de passe :</label>
                <input type="password" name="password-retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Valider les changements</button>
            </div>   
    </form>
</body>

</html>