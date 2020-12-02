<?php

use Core\View\Template\Template;

ob_start();

?>

    <section id="content-page">
        <h1 class="text-center">
            <?= $poll->pollName; ?>
        </h1>
        <form action="#" method="POST" data-poll-id="<?= $poll->idPoll; ?>" id="poll-response-form"></form>
    </section>

<?php 
$content = ob_get_clean();
$temp = new Template($poll->pollName, ["poll-response"]);
$temp->render($content);