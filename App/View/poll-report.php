<?php

use Core\View\Template\Template;

ob_start();
?>

<header>
    <h1 class="text-center"><?= $poll->pollName ?></h1>
    <p class="text-center">
        <?= $poll->description ?>
    </p>
</header>
<section>
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
            <h2>Messages en temps réel</h2>
        </header>
        <div>
            <!-- MESSAGES -->
        </div>
    </section>
    <footer class="d-flex justify-content-center">
        <a href="#" class="btn btn-danger">Clôtuer</a>
    </footer>
</section>

<?php
$content = ob_get_clean();
$temp = new Template($poll->pollName);
$temp->render($content);