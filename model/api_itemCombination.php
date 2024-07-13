<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function addItemCombination($shipBuild, $equipmentType, $itemType, $rarityType, $damageType, $modifierData, $slotType, $itemTier){
    global $pdo;

    $insertItemCombinationSQL = "INSERT INTO itemCombination(shipBuildID, equipmentTypeID, itemTypeID, rarityID, damageTypeID, modifierDataID, slotTypeID, itemTierID) VALUES (:shipBuildID, :equipmentTypeID, :itemTypeID, :rarityID, :damageTypeID, :modifierDataID, :slotTypeID, :itemTierID)";
    $statement = $pdo -> prepare($insertItemCombinationSQL);

    $success = $statement -> execute([
        "shipBuildID" => $shipBuild,
        "equipmentTypeID" => $equipmentType,
        "itemTypeID" => $itemType,
        "rarityID" => $rarityType,
        "damageTypeID" => $damageType,
        "modifierDataID" => $modifierData,
        "slotTypeID" => $slotType,
        "itemTierID" => $itemTier
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode("Success");
    } else {
        return json_encode("Fail");
    }
}

function readItemCombination($shipbuildID){
    global $pdo;

    global $pdo;
    $readShipBuildByID = "SELECT * FROM itemCombination WHERE id = '$shipbuildID' LIMIT 1";

    $readShipBuildQuery = $pdo -> query($readShipBuildByID);
    $readShipBuilds = $readShipBuildQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipBuilds);
}

function deleteShipBuild($shipbuildID){
    global $pdo;

    $deleteShipBuild = "DELETE FROM itemCombination WHERE id = :articleID";
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

?>