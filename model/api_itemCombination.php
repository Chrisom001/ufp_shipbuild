<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function addItemCombination($shipBuild, $equipmentType, $itemType, $rarityType, $damageType, $modifierData, $slotType, $itemTier, $weaponType){
    global $pdo;
    $foreWeapon = 0;
    $rearWeapon = 0;
    if($weaponType == "fore"){
        $foreWeapon = 1;
    } elseif($weaponType == "rear"){
        $rearWeapon = 1;
    }

    $insertItemCombinationSQL = "INSERT INTO itemCombination(shipBuildID, equipmentTypeID, itemTypeID, rarityID, damageTypeID, modifierDataID, slotTypeID, itemTierID, isFrontWeapon, isRearWeapon) VALUES (:shipBuildID, :equipmentTypeID, :itemTypeID, :rarityID, :damageTypeID, :modifierDataID, :slotTypeID, :itemTierID, :foreweapon, :rearWeapon)";
    $statement = $pdo -> prepare($insertItemCombinationSQL);

    $success = $statement -> execute([
        "shipBuildID" => $shipBuild,
        "equipmentTypeID" => $equipmentType,
        "itemTypeID" => $itemType,
        "rarityID" => $rarityType,
        "damageTypeID" => $damageType,
        "modifierDataID" => $modifierData,
        "slotTypeID" => $slotType,
        "itemTierID" => $itemTier,
        "foreweapon" => $foreWeapon,
        "rearweapon" => $rearWeapon
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode("Success");
    } else {
        return json_encode("Fail");
    }
}

function readItemCombination($shipbuildID, $isCheck, $type){
    global $pdo;
    if($type == "weapon"){
        $readShipBuildByID = "SELECT * FROM itemCombination WHERE shipBuildID = $shipbuildID";
    } elseif($type == "console"){
        $readShipBuildByID = "SELECT equipmentTypes.equipmentType, equipmentType.equipmentTypeID, itemCombination.itemTierID, equipmentType.isConsole FROM itemCombination INNER JOIN equipmentType ON itemCombination.equipmentTypeID = equipmentType.id INNER JOIN equipmentTypes ON equipmentType.equipmentTypeID = equipmentTypes.id WHERE shipBuildID = $shipbuildID AND $isCheck = 1";
    }

    $readShipBuildQuery = $pdo -> query($readShipBuildByID);
    $readShipBuilds = $readShipBuildQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readShipBuilds);
}

function deleteShipBuild($shipbuildID)
{
    global $pdo;

    $deleteShipBuild = "DELETE FROM itemCombination WHERE id = :articleID";
    $statement = $pdo->prepare($deleteShipBuild);

    $success = $statement->execute([
        "articleID" => $shipbuildID
    ]);

    if ($success && $statement->rowCount() > 0) {
        return json_encode(true);
    } else {
        return json_encode(false);
    }
}
?>