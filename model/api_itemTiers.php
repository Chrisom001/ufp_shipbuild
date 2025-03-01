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

function getItemTierById($id){
    global $pdo;
    $getItemTierSQL = "SELECT tierLevel FROM itemTiers WHERE id = $id";
    $check = $pdo -> prepare($getItemTierSQL);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}
?>