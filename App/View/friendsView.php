<?php

use Core\View\Template\Template;

ob_start();

?>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Friends</th>
    </tr>
  </thead>
  <tbody>

  <?php

    foreach ($friend as $key => $value) {

    ?>

      <tr>
        <td>Mark</td>
      </tr>

      <?php

    }

  ?>

  </tbody>
</table>


<?php 
    $content = ob_get_clean();
    $temp = new Template("Amis");
    $temp->render($content);
?>
