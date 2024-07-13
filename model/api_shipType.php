<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipWeaponSlots($shipTypeID){
    if($shipTypeID == 1){
        $myObject = new stdClass();
        $myObject->foreSlots = 1;
        $myObject->rearSlots = 1;

        $myJson = json_encode($myObject);

        return $myJson;
    } elseif ($shipTypeID == 2){
        $myObject = new stdClass();
        $myObject->foreSlots = 2;
        $myObject->rearSlots = 2;

        $myJson = json_encode($myObject);

        return $myJson;
    } elseif ($shipTypeID == 3){
        $myObject = new stdClass();
        $myObject->foreSlots = 3;
        $myObject->rearSlots = 3;

        $myJson = json_encode($myObject);

        return $myJson;
    } elseif ($shipTypeID == 4){
        $myObject = new stdClass();
        $myObject->foreSlots = 4;
        $myObject->rearSlots = 4;

        $myJson = json_encode($myObject);

        return $myJson;
    } else {
    return "Error"; }
}

function getShipEquipmentSlots($shipTypeID){
    
}
?>