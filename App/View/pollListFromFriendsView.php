<?php

use Core\View\Template\Template;

ob_start()

?>

    <section>
            <header class="d-flex justify-content-between align-items-center">
                <h1>Liste des sondages de vos amis</h1>
            </header>


            <?php 

                if($polls) :  
                    foreach ($polls as $poll):
                
            ?>

            <article class="card" >
                <div class="card-body">
                    <h5 class="card-title"><?= $poll->pollName ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Créé le : <?= $poll->createdAt ?></h6>
                    <p class="card-text"><?= $poll->description ?></p>
                    
                    <a href="<?= MAIN_PATH . POLL_RESPONSE . "/" . $poll->idPoll ?>" class="btn btn-primary">Répondre</a>
                    <div class="d-flex flex-row justify-content-between">
                        <p>
                            Disponible jusqu'à : <span><?= $poll->unAvailableAt ?></span>
                        </p>
                        <blockquote>
                            <p>Crée par <strong><?= $poll->username ?></strong></p>
                        </blockquote>
                    </div>
                </div>
            </article>

            <?php 
                    endforeach;
                else :
                    
            ?>
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-warning">
                        Vous n'avez pas encore de sondage proposé !
                </div> 
            </div>
            
            <?php endif; ?>


    </section>

<?php
$content = ob_get_clean();
$temp = new Template("Sondages de vos amis");
$temp->render($content);