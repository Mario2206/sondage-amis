
 <?php

use Core\View\Template\Template;

ob_start() 

?>
    <nav style="width: 100%; height: 50px; background-color: rgb(0, 0, 0, 20%)">
        <a style="position: absolute; right: 30px; top: 10px; font-size: large; color: black; text-decoration: none" href="<?= MAIN_PATH . "/poll/myAccount" ?>">My account</a>
    </nav>
    <h1>Liste de vos sondages</h1>

    <?php 
    
        if($polls) :  
            foreach ($polls as $poll):
        
    ?>

    <div class="card" >
        <div class="card-body">
            <h5 class="card-title"><?= $poll->pollName ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Créé le : <?= $poll->createdAt ?></h6>
            <p class="card-text"><?= $poll->description ?></p>
            <a href="#" class="btn btn-primary">Go</a>
        </div>
    </div>

    <?php 
            endforeach;
        else :
             
    ?>
    <div class="alert alert-warning">
            Vous n'avez pas encore de sondage créé !
    </div>
    <?php endif; ?>
    
<?php 
    $content = ob_get_clean();
    $temp = new Template("Liste des sondages");
    $temp->render($content);
?>
