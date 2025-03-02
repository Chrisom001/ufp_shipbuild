<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getAllModifiers(){
    global $pdo;
    $itemRarity = "SELECT * FROM modifiers";

    $itemRarityQuery = $pdo -> query($itemRarity);
    $itemTrar = $itemRarityQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($itemTrar);
}
?>