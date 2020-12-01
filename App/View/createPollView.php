<?php

use Core\View\Template\Template;

ob_start() 

?>
    <?php require(ROOT . "\App\View\inc\alert-error.php"); ?>
    <main class="container-fluid d-flex flex-column align-items-center">
        <div>

            <?php require_once(ROOT . "\App\View\inc\alert-error.php"); ?>
                
        </div>
        <section  class="container-fluid d-flex flex-column align-items-center">
            <h1>Créer son sondage</h1>
            <form action="<?=  MAIN_PATH . POLL_CREATION ?>" class="col-6 d-flex flex-column align-items-center poll-form" method="POST">
                <div class="poll-container-form--input-wrapper py-4">
                    <label for="poll_name">Nom du sondage</label>
                    <input type="text" placeholder="Entre 2 et 30 caractères" id="poll_name" name="poll_name">
                </div>
                <div class="d-flex">
                    <div class="px-3">
                        <label for="poll_available">Disponible le</label>
                        <input type="datetime-local" name="poll_available" id="poll_available">
                    </div>
                    <div class="px-3">
                        <label for="poll_unavailable">Indisponible le</label>
                        <input type="datetime-local" name="poll_unavailable" id="poll_unavailable">
                    </div>
                </div>
                <div class="d-flex flex-column w-100 py-4">
                    <label for="poll_description " class="text-center">Description du sondage</label>
                    <textarea col="30" rows="10" placeholder="Entre 5 et 100 caractères" id="poll_description" name="poll_description"></textarea>
                </div>
                <div class="w-100">
                    <button class="btn btn-info add-question">Ajouter une question</button>
                </div>
                <div class="w-100 container-question-response"></div>
                <button type="submit" class="btn btn-primary poll-validation" class="" disabled>
                    Valider
                </button>
            </form> 
        </section>
    </main>

<?php 
    $content = ob_get_clean();
    $temp = new Template("Création de sondages", ["create-poll"]);
    $temp->render($content);
?>
