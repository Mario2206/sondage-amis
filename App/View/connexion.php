<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
                if(isset($_GET['login_err'])){
                    $err = htmlspecialchars($_GET['login_err']);
                    switch($err){
                        case 'password' :
                                ?>
                            <div>
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                            <?php
                            break;
                        
                        case 'pseudo' :
                            ?>
                            <div>
                                <strong>Erreur</strong> pseudo incorrect
                            </div>
                            <?php
                            break;
                        
                        case 'already' :
                            ?>
                            <div>
                                <strong>Erreur</strong> compte non existant
                            </div>
                            <?php
                            break;
                    }
                }

            ?>
        <form action="<?= MAIN_PATH."/login" ?>" method="post">
            <h2>Connexion</h2>
            <div>
                <input type="text" name="pseudo" placeholder="Pseudo" required="required">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div>
                <button type="submit">Connexion</button>
            </div>
        </form>
        <p>
            <a href="<?= MAIN_PATH ?>/register">
                Inscription
            </a>
        </p>
    </div>
</body>

</html>