<?php

use Core\Model\Converters\TypeConverter;

function disponibilitySate($currentDate, $availableAt, $unAvailableAt) {

    $availableTime = TypeConverter::convertToDate($availableAt);
    $unAvailableTime = TypeConverter::convertToDate($unAvailableAt);
    $currentTime = TypeConverter::convertToDate($currentDate);
    
    if( $currentTime > $availableTime && $currentTime < $unAvailableTime) : 
                            
        echo "<p class='text-success text-center'>Disponible</p>";
   
    elseif($currentTime < $availableTime) : 

        echo  "<p class='text-warning text-center'>Pas encore Disponible</p>";

    else : 

        echo "<p class='text-danger text-center'>Plus disponbile</p>";
    
    endif;

}