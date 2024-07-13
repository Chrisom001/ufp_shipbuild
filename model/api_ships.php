<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipList(){
    global $pdo;
    $readShips = "SELECT id, shipName, shipTierID FROM ships";

    $readShipsQuery = $pdo -> query($readShips);
    $readShip = $readShipsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShip);
}

function getShipListByTier($shipTier){
    global $pdo;
    $readShips = "SELECT id, shipName FROM ships WHERE shipTierID = $shipTier";

    $readShipsQuery = $pdo -> query($readShips);
    $readShip = $readShipsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShip);
}
?>