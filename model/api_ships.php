<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getShipList(){
    global $pdo;
    $readShips = "SELECT id, shipName FROM ships";

    $readShipsQuery = $pdo -> query($readShips);
    $readShip = $readShipsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShip);
}
?>