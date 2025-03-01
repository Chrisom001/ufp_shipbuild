<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getAllShipBuilds(){
    global $pdo;
    $readShipBuilds = "SELECT * FROM shipBuild";

    $readShipBuildsQuery = $pdo -> query($readShipBuilds);
    $readShipBuilds = $readShipBuildsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipBuilds);
}

function getLatestShipBuilds(){
    global $pdo;
    $readShipBuilds = "SELECT * FROM shipBuild INNER JOIN ships ON shipBuild.shipID = ships.id ORDER BY shipBuild.id DESC LIMIT 3 ;";

    $readShipBuildsQuery = $pdo -> query($readShipBuilds);
    $readShipBuilds = $readShipBuildsQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipBuilds);
}

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
    $readShipBuildByID = "SELECT * FROM shipBuild WHERE id = '$shipbuildID' LIMIT 1";

    $readShipBuildQuery = $pdo -> query($readShipBuildByID);
    $readShipBuilds = $readShipBuildQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipBuilds);
}

function getShipIDbyShipBuildID($shipBuildID){
    global $pdo;
    $readShipTypeByIDQuery = "SELECT shipID FROM shipBuild WHERE id = $shipBuildID";
    $check = $pdo -> prepare($readShipTypeByIDQuery);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}

//function deleteShipBuild($shipbuildID){
//    global $pdo;
//
//    $deleteShipBuild = "DELETE FROM shipBuild WHERE id = :articleID";
//    $statement = $pdo -> prepare($deleteShipBuild);
//
//    $success = $statement -> execute([
//        "articleID" => $shipbuildID
//    ]);
//
//    if($success && $statement -> rowCount() > 0){
//        return json_encode(true);
//    } else {
//        return json_encode(false);
//    }
//}

function checkIfBuildExists($shipbuildID){
    global $pdo;

    $checkUserSQL = "SELECT * FROM shipBuild WHERE id = :shipID";

    $statement = $pdo -> prepare($checkUserSQL);

    $success = $statement -> execute ([
        "shipID" => $shipbuildID
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode("True");
    } else {
        return json_encode("False");
    }
}

function getShipBuildByID($shipBuildID){
    global $pdo;
    $readShipTypeByIDQuery = "SELECT * FROM shipBuild WHERE id = $shipBuildID";
    $readShipTypeByIDQuery = $pdo -> query($readShipTypeByIDQuery);
    $readShipTypeByID = $readShipTypeByIDQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipTypeByID);
}
?>