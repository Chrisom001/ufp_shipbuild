<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipWeaponSlots($shipTypeID, $slotType){
    global $pdo;
    $readShipWeaponSlots = "SELECT $slotType FROM ships WHERE id = $shipTypeID";

    $check = $pdo -> prepare($readShipWeaponSlots);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}

function getShipEquipmentSlots($shipTypeID){
    global $pdo;
    $readConsoleSlots = "SELECT engConsoleNum, tacConsoleNum, sciConsoleNum, universalConsoleNum FROM ships WHERE id =" . $shipTypeID;

    $readConsoleSlotsQuery = $pdo -> query($readConsoleSlots);
    $consoleSlots = $readConsoleSlotsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($consoleSlots);
}

function getShipTypeByID($shipTypeID){
    global $pdo;
    $readShipTypeByIDQuery = "SELECT shipTypes FROM shipType WHERE id = $shipTypeID";
    $check = $pdo -> prepare($readShipTypeByIDQuery);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}

function getConsoleSlotsByShipTypeID($shipTypeID){
    global $pdo;
    $readShipWeaponSlots = "SELECT engConsoleNum, tacConsoleNum, sciConsoleNum, universalConsoleNum FROM ships WHERE id = $shipTypeID";

    $readShipWeaponSlotsQuery = $pdo -> query($readShipWeaponSlots);
    $weaponSlots = $readShipWeaponSlotsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($weaponSlots);
}

function getOfficerSlotsByShipTypeID($shipTypeID){
    global $pdo;
    $readShipOfficerSlots = "SELECT numOfTacOfficers, numOfEngOfficers, numOfSciOfficers, numOfUniOfficers FROM ships WHERE id = $shipTypeID";

    $readShipOfficerSlotsQuery = $pdo -> query($readShipOfficerSlots);
    $officerSlots = $readShipOfficerSlotsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($officerSlots);
}
?>