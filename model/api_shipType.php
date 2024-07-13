<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipWeaponSlots($shipTypeID){
    global $pdo;
    $readShipWeaponSlots = "SELECT frontSlot, rearSlot FROM ships WHERE id = $shipTypeID";

    $readShipWeaponSlotsQuery = $pdo -> query($readShipWeaponSlots);
    $weaponSlots = $readShipWeaponSlotsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($weaponSlots);
}

function getShipEquipmentSlots($shipTypeID){
    global $pdo;
    $readConsoleSlots = "SELECT engConsoleNum, tacConsoleNum, sciConsoleNum, universalConsoleNum FROM ships WHERE id = $shipTypeID";

    $readConsoleSlotsQuery = $pdo -> query($readConsoleSlots);
    $consoleSlots = $readConsoleSlotsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($consoleSlots);
}
?>