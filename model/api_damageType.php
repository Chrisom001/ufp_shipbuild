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

function getDamageTypeByID($id){
    global $pdo;
    $getNameSQL = "SELECT damageType FROM damageType WHERE id = $id";
    $check = $pdo -> prepare($getNameSQL);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}

function editDamageType($id,$damageType){

}

function deleteDamageType($id){

}

function addDamageType($damageType){

}
?>