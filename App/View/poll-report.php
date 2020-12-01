<?php

use Core\View\Template\Template;

ob_start();
?>

<header class="d-flex flex-column align-items-center">
    <h1 class="text-center"><?= $poll->pollName ?></h1>
    <p class="text-center py-3">
        <?= $poll->description ?>
    </p>
    <div class="d-flex justify-content-center py-3">
        <div class="d-flex flex-column align-items-center">
            <p>
                Disponible le
            </p>
            <span class="border border-black mx-3 p-2">
                <?= $poll->availableAt ?>
            </span>  
        </div>
        <div class="d-flex flex-column align-items-center">
            <p>
                Indisponible le
            </p>
            <span  class="border border-black mx-3 p-2">
                <?= $poll->unAvailableAt ?>
            </span>
        </div>
    </div>
    <div class="py-2">

        <p>Situation actuelle :</p>

        <?php 
            require_once(ROOT . "\App\View\inc\disponibility-state.php");
            disponibilitySate($currentDate, $poll->availableAt, $poll->unAvailableAt);
        ?>

    </div>
</header>
<section class="d-flex flex-column align-items-center">
    <?php
        require_once(ROOT . "\App\View\inc\modal-disponibility-date.php");
        ModalDisponibilityDate($poll->idPoll);
    ?>
    <?php foreach($questions as $q=>$res) : ?>

        <article class="py-5">

            <h2 class="py-4">

                <?= $q?>

            </h2>

            <ul class="list-group">

                <?php foreach($res as $answer) : ?>

                    <li class="list-group-item d-flex flex-column">

                        <p>

                            <?= $answer["answer"] ?>

                        </p>

                        <strong class="align-self-end">

                            Nombre de votants : <?= $answer["nVoter"] ?>

                        </strong>

                    </li>

                <?php endforeach; ?>

            </ul>

        </article>

    <?php endforeach; ?>

    <section class="py-3 my-5 h-50 w-100 border border-dark">

        <header>

            <h3>Messages en temps réel</h3>

        </header>

        <div>
            <!-- MESSAGES -->
        </div>

    </section>

    <footer class="d-flex justify-content-center">
       
        <?php
            require_once(ROOT . "\App\View\inc\disponibility-btn.php");
            disponibilityBtn($poll->idPoll, $currentDate, $poll->availableAt , $poll->unAvailableAt);
        ?>

    </footer>
</section>

<?php
$content = ob_get_clean();
$temp = new Template($poll->pollName);
$temp->render($content);