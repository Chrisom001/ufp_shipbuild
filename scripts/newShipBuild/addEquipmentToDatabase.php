<?php

function getPOSTData($postData){
    //var_dump($postData);
    $slotsJson = getNumberOfSlots($postData->shipSelector);
    var_dump($slotsJson);
}
?>