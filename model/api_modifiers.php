<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getAllModifiersByEquipmentType($equipmentType){
    global $pdo;
    $itemRarity = "SELECT * FROM modifiers WHERE equipmentTypeID = $equipmentType";

    $itemRarityQuery = $pdo -> query($itemRarity);
    $itemTrar = $itemRarityQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($itemTrar);
}
?>