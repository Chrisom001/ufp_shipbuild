<?php
$db = new dbObj();
$pdo =  $db->getConnstring();

function getOfficersForShip($shipID){
    global $pdo;
    $readShipOfficerSlots = "SELECT numOfTacOfficers, numOfEngOfficers, numOfSciOfficers, numOfUniOfficers FROM ships WHERE id = $shipID";

    $readShipOfficerSlotsQuery = $pdo -> query($readShipOfficerSlots);
    $officerSlots = $readShipOfficerSlotsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($officerSlots);
}

function getOfficers($shipID){
    global $pdo;
    $readShipOfficers = "SELECT * FROM shipBridgeOfficers INNER JOIN bridgeOfficerAbilityList ON bridgeOfficerAbilityList.shipBridgeOfficerID = shipBridgeOfficers.id WHERE shipBuildID = $shipID";

    $readShipOfficersQuery = $pdo -> query($readShipOfficers);
    $shipOfficers = $readShipOfficersQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($shipOfficers);
}

function getAbilityNameByID($abilityID){
    global $pdo;
    $getNameSQL = "SELECT abilityName FROM bridgeOfficerAbilities WHERE id = $abilityID";
    $check = $pdo -> prepare($getNameSQL);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}


?>