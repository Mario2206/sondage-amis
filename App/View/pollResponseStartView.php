<?php

use Core\View\Template\Template;

ob_start();

?>

    <section class="d-flex flex-column align-items-center">
        <h1>
            <?= $poll->pollName; ?>
        </h1>
        <p>
            <?= $poll->description; ?>
        </p>
        <a href="<?= MAIN_PATH . POLL_RESPONSE . "/" . $poll->idPoll ?>" class='btn btn-primary'>
            Commencer à répondre !
        </a>
    </section>

<?php 
$content = ob_get_clean();
$temp = new Template("Démarrage du sondage");
$temp->render($content);