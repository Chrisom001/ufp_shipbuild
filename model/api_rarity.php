<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getAllRaritys(){
    global $pdo;
    $itemRarity = "SELECT * FROM rarity";

    $itemRarityQuery = $pdo -> query($itemRarity);
    $itemTrar = $itemRarityQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($itemTrar);
}
?>