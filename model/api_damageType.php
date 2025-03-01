<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getAllDamageTypes(){
    global $pdo;
    $readDamageTypes = "SELECT id, damageType FROM damageType";

    $readDamageTypesQuery = $pdo -> query($readDamageTypes);
    $readDamage = $readDamageTypesQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readDamage);
}

function getDamageTypeById($id){

}

function editDamageType($id,$damageType){

}

function deleteDamageType($id){

}

function addDamageType($damageType){

}
?>