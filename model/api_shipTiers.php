<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipTiers(){
    global $pdo;
    $readShipTiers = "SELECT id, shipTier FROM shipTiers";

    $readShipTiersQuery = $pdo -> query($readShipTiers);
    $readTier = $readShipTiersQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readTier);
}
?>