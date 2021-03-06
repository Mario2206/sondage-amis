<?php

use Core\View\Template\Template;

ob_start() 

?>
    <div>

        <?php if($error):?>

        <div>
            <p>
                <?= $error ?>
            </p>
        </div>

        <?php endif;?>

        <form action="<?= MAIN_PATH."/register" ?>" method="post">
                <h2 class="text-center">Inscription</h2>
                <div class="form-group">
                    <label for="firstName">Votre nom :</label>
                    <input type="text" name="firstName" class="form-control" placeholder="First name" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="lastName">Votre prénom :</label>
                    <input type="text" name="lastName" class="form-control" placeholder="Last name" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="username">Votre pseudo :</label>
                    <input type="text" name="username" class="form-control" placeholder="2 to 50 chars" required="required" autocomplete="off">
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
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
        </form>
    </div>
<?php 
$content = ob_get_clean();
$temp = new Template("Liste des sondages");
$temp->render($content);
?>