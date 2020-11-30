<?php

use Core\View\Template\Template;

ob_start();
?>
    <div class="container-fluid container-confirm d-flex justify-content-center flex-column align-items-center">
        <div class="alert alert-success">
                <?= $message ?>
        </div>
        <a href="<?= MAIN_PATH . POLL_LIST ?>" class="btn btn-primary">
            Retour aux sondages
        </a>
    </div>
   
<?php 
$content = ob_get_clean();
$temp = new Template("Sondage créé");
$temp->render($content);


?>