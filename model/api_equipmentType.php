<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getAllEquipmentTypes(){
    global $pdo;
    $readAllEquipment = "SELECT equipmentType.id, equipmentName, isWeapon, isEquipment, equipmentType FROM equipmentType INNER JOIN equipmentTypes ON equipmentType.equipmentTypeID = equipmentTypes.id;";

    $readAllEquipmentQuery = $pdo -> query($readAllEquipment);
    $readEquipment = $readAllEquipmentQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readEquipment);
}

function getAllWeaponTypes(){
    global $pdo;
    $readAllWeapons = "SELECT equipmentType.id, equipmentName, equipmentType FROM equipmentType INNER JOIN equipmentTypes ON equipmentType.equipmentTypeID = equipmentTypes.id WHERE isWeapon = 1;";

    $readWeaponsQuery = $pdo -> query($readAllWeapons);
    $readWeapon = $readWeaponsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readWeapon);
}

function getAllEquipments(){
    global $pdo;
    $readAllEquipment = "SELECT equipmentType.id, equipmentName, equipmentType FROM equipmentType INNER JOIN equipmentTypes ON equipmentType.equipmentTypeID = equipmentTypes.id WHERE isEquipment = 1;";

    $readEquipmentQuery = $pdo -> query($readAllEquipment);
    $readEquipment = $readEquipmentQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readEquipment);
}

function getAllConsoles(){
    global $pdo;
    $readAllEngConsoles = "SELECT equipmentType.id, equipmentName, equipmentType FROM equipmentType INNER JOIN equipmentTypes ON equipmentType.equipmentTypeID = equipmentTypes.id WHERE isConsole = 1;";
    $readEngConsoleQuery = $pdo -> query($readAllEngConsoles);
    $readEquipment = $readEngConsoleQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readEquipment);
}

function addEquipmentType($name, $equipmentName, $type){

}

function deleteEquipmentType($id){

}

function updateEquipmentType($id, $name, $type){

}
?>