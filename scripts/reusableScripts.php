<?php
function viewShipItems($type, $shipID){
    $itemType = "";
    if($type == "foreweapons"){
        $check = "isFrontWeapon";
        $itemType = "weapon";
    } else if($type == "rearweapons"){
        $check = "isRearWeapon";
        $itemType = "weapon";
    } elseif($type == "science" || $type == "engineering" || $type == "tactical"){
        $check = "isConsole";
        $itemType = "console";
    }

    $shipItems = json_decode(readItemCombination($shipID, $check));
    $WeaponsArray = array();
    var_dump($shipItems);
//    foreach($shipItems as $shipItem){
//        if($shipItem->$check == 1){
//            var_dump($shipItem);
//            if($itemType == "console"){
//                if($shipItem->equipmentType == $type){
//                    echo $shipItem->equipmentType . " vs " . $type;
//                    $consoleData = json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK" . json_decode(getItemTierById($shipItem->itemTierID)) . $shipItem->equipmentType;
//                    $WeaponsArray[] = $consoleData;
//                }
//            } elseif($itemType == "weapon"){
//                $weaponData = json_decode(getDamageTypeByID($shipItem->damageTypeID)) . " " . json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK" . json_decode(getItemTierById($shipItem->itemTierID));
//                $WeaponsArray[] = $weaponData;
//            }
//        }
//    }
    return $WeaponsArray;
}
?>