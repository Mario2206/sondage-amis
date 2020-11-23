<?php

use Core\View\Template\Template;

ob_start() 

?>

    <main class="container-fluid d-flex flex-column align-items-center">
        <h1>Créer son sondage</h1>
        <form action="<?=  MAIN_PATH ?>poll/creation" class="col-6 d-flex flex-column align-items-center poll-form" method="POST">
            <div class="poll-container-form--input-wrapper py-4">
                <label for="poll_name">Nom du sondage</label>
                <input type="text" id="poll_name" name="poll_name">
            </div>
            <div class="d-flex flex-column w-100 py-4">
                <label for="poll_description " class="text-center">Description du sondage</label>
                <textarea col="30" rows="10" id="poll_description" name="poll_description"></textarea>
            </div>
            <div class="w-100">
                <button class="btn btn-info add-question">Ajouter une question</button>
            </div>
            <div class="w-100 container-question-response"></div>
            <button type="submit" class="btn btn-primary poll-validation" class="" disabled>
                Valider
            </button>
        </form> 
    </main>

<?php 
    $content = ob_get_clean();
    $temp = new Template("Création de sondages", ["create-poll"]);
    $temp->render($content);
?>
