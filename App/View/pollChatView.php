<?php

use Core\View\Template\Template;

ob_start();

?>

<section>
    <h1>
        Chat du sondage : <?= $poll->pollName; ?>
    </h1>
    <div id="poll-chat" class="border" style="height:50vh"></div>
    <form action="<?= MAIN_PATH . POLL_CHAT . "/" . $poll->idPoll  ?>" class="d-flex justify-content-center py-3" id="poll-chat-form">
        <input type="text" placeholder="Envoyer un message" class="p-2" name="poll-message">
        <button type="submit" class="btn btn-primary mx-3">Envoyer</button>
    </form>
</section>

<?php 

$content = ob_get_clean();
$temp = new Template("Chat de sondage", ["poll-chat"]);
$temp->render($content);