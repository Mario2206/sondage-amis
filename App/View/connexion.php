<?php

use Core\View\Template\Template;

ob_start() 

?>
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
                <input type="text" name="username" placeholder="Pseudo" required="required">
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
<?php 
$content = ob_get_clean();
$temp = new Template("Création de sondages", ["create-poll"]);
$temp->render($content);
?>
