<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipWeaponSlots($shipTypeID){
    if($shipTypeID == 1){
        $myObject = "";
        $myObject->foreSlots = 1;
        $myObject->rearSlots = 1;

        $myJson = json_encode($myObject);

        return $myJson;
    } elseif ($shipTypeID == 2){
        $myObject = "";
        $myObject->foreSlots = 2;
        $myObject->rearSlots = 2;

        $myJson = json_encode($myObject);

        return $myJson;
    } elseif ($shipTypeID == 3){
        $myObject = "";
        $myObject->foreSlots = 3;
        $myObject->rearSlots = 3;

        $myJson = json_encode($myObject);

        return $myJson;
    } elseif ($shipTypeID == 4){
        $myObject = "";
        $myObject->foreSlots = 4;
        $myObject->rearSlots = 4;

        $myJson = json_encode($myObject);

        return $myJson;
    } else {
    return "Error"; }
}
?>