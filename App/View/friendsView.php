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
    <tr>
      <td>Mark</td>
    </tr>
    <tr>
      <td>Jacob</td>
    </tr>
    <tr>
      <td>Larry</td>
    </tr>
  </tbody>
</table>








<?php 
    $content = ob_get_clean();
    $temp = new Template("Amis");
    $temp->render($content);
?>
