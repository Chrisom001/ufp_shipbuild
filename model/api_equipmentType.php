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

}

function getAllEquipments(){

}

function addEquipmentType($name, $equipmentName, $type){

}

function deleteEquipmentType($id){

}

function updateEquipmentType($id, $name, $type){

}
?>