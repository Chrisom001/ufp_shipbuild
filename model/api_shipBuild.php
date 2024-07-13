<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function addShipBuild($user, $ship){
    global $pdo;

    $insertShipBuildSQL = "INSERT INTO shipBuild(userID, shipID) VALUES (:userID, :shipID)";
    $statement = $pdo -> prepare($insertShipBuildSQL);

    $success = $statement -> execute([
        "userID" => $user,
        "shipID" => $ship
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode("Success");
    } else {
        return json_encode("Fail");
    }
}

function readShipBuild($shipbuildID){
    global $pdo;

    global $pdo;
    $readShipBuildByID = "SELECT * FROM shipBuild WHERE id = '$shipbuildID' LIMIT 1";

    $readShipBuildQuery = $pdo -> query($readShipBuildByID);
    $readShipBuilds = $readShipBuildQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipBuilds);
}

function deleteShipBuild($shipbuildID){
    global $pdo;

    $deleteShipBuild = "DELETE FROM shipBuild WHERE id = :articleID";
    $statement = $pdo -> prepare($deleteShipBuild);

    $success = $statement -> execute([
        "articleID" => $shipbuildID
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode(true);
    } else {
        return json_encode(false);
    }
}
?>