<?php

use Core\View\Template\Template;

ob_start();

?>

<form action="<?= MAIN_PATH ."/friends" ?>" method="post">

  <div class="input-group mb-3">
    <input name="username" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Envoyer</button>
    </div>
  </div>
</form>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Friends</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

  <?php
    if($friends):
      foreach ($friends as $friend):
  ?>

  <tr>

    <td>
      <?= $friend->username ?>
    </td>

      <?php
        if($friend->accepted == 0):
      ?>

      <td>
        <form action="" method="post">
          <a class="btn btn-outline-success" href="<?= MAIN_PATH . FRIENDS_ACCEPT . "/" . $friend->idFriend ?>">Accept</a>
          <a class="btn btn-outline-danger" href="<?= MAIN_PATH . FRIENDS_REJECT . "/" . $friend->idFriend ?>">Reject</a>
        </form>
      </td>
      <?php
        else:
      ?>
      <td>
      <a class="btn btn-outline-danger" href="<?= MAIN_PATH . FRIENDS_REMOVE . "/" . $friend->idFriend ?>">Remove</a>
      </td>
  </tr>

  <?php
        endif;
      endforeach;
    endif;
    
  ?>




  </tbody>
</table>


<?php 
    $content = ob_get_clean();
    $temp = new Template("Amis");
    $temp->render($content);
?>
