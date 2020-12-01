<?php

use Core\Model\Converters\TypeConverter;

function disponibilityBtn ($idPoll, $currentDate, $availableAt, $unAvailableAt) {
    
    $availableTime = TypeConverter::convertToDate($availableAt);
    $unAvailableTime = TypeConverter::convertToDate($unAvailableAt);
    $currentTime = TypeConverter::convertToDate($currentDate);

    if($currentTime > $availableTime && $currentTime < $unAvailableTime) :
                            
        echo "<a href='" . MAIN_PATH . POLL_CLOSE . "/" .$idPoll . "' class='btn btn-danger'>Clôturer</a>";

    else :

        echo '   <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Rendre disponible</button>';
    
    endif;
}