
 <?php

use Core\View\Template\Template;
require_once(ROOT . "\App\View\inc\modal-disponibility-date.php");
ob_start() 

?>
    <section>
            
            <header class="d-flex justify-content-between align-items-center">
                <h1>Liste de vos sondages</h1>
                <a href="<?= MAIN_PATH . POLL_CREATION ?>" class="btn btn-success">Créer un sondage</a>
            </header>
            

            <?php 

                if($polls) :  
                    foreach ($polls as $poll):
                
            ?>

            <article class="card" >
                <?php
                    ModalDisponibilityDate($poll->idPoll);
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $poll->pollName ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Créé le : <?= $poll->createdAt ?></h6>
                    <p class="card-text"><?= $poll->description ?></p>
                    
                    <div>
                        <a href="<?= MAIN_PATH . POLL_REPORT . "/" . $poll->idPoll ?>" class="btn btn-primary">Go</a>
                        <?php
                            $availableAt =  $poll->availableAt;
                            $unAvailableAt =  $poll->unAvailableAt ;

                            require_once(ROOT . "\App\View\inc\disponibility-btn.php");
                            require_once(ROOT . "\App\View\inc\disponibility-state.php");

                            disponibilityBtn($poll->idPoll, $currentDate, $availableAt, $unAvailableAt);
                            disponibilitySate($currentDate,$availableAt, $unAvailableAt);
                        ?>
                            
                    </div>
                </div>
            </article>

            <?php 
                    endforeach;
                else :
                    
            ?>
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-warning">
                        Vous n'avez pas encore de sondage créé !
                </div> 
            </div>
            
            <?php endif; ?>
    </section>    
        
    
    
<?php 
    $content = ob_get_clean();
    $temp = new Template("Liste des sondages");
    $temp->render($content);
?>
