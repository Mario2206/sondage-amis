
 <?php

use Core\View\Template\Template;

ob_start() 

?>
    
        <header class="d-flex justify-content-between align-items-center">
            <h1>Liste de vos sondages</h1>
            <a href="<?= MAIN_PATH . POLL_CREATION ?>" class="btn btn-success">Créer un sondage</a>
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
                
                <div>
                    <a href="<?= MAIN_PATH . POLL_REPORT . "/" . $poll->idPoll ?>" class="btn btn-primary">Go</a>
                    <?php
                        $availableAt =  $poll->availableAt;
                        $unAvailableAt =  $poll->unAvailableAt ;
                    ?>
                        <?php if($currentDate > $availableAt && $currentDate < $unAvailableAt) : ?>
                            
                                <a href="#" class="btn btn-danger">Clôturer</a>
                                <p class='text-success'>Disponible</p>
                           
                        <?php elseif($currentDate < $availableAt) :  ?>
                       
                                <a href="#" class="btn btn-success">Rendre disponible</a>
                                <p class='text-warning'>Pas encore Disponible</p>
                         <?php else : ?>
                       
                                <a href="#" class="btn btn-success">Rendre disponible</a>
                                <p class='text-danger'>Plus disponbile</p>
                           
                         <?php endif ?>   
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
    
    
<?php 
    $content = ob_get_clean();
    $temp = new Template("Liste des sondages");
    $temp->render($content);
?>
