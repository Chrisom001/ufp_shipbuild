<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getItemTiers(){
    global $pdo;
    $itemTiers = "SELECT * FROM itemTiers";

    $itemTiersQuery = $pdo -> query($itemTiers);
    $itemTier = $itemTiersQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($itemTier);
}
?>