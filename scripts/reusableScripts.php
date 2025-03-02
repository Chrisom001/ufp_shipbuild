<?php
function viewShipItems($type, $shipID){
    if($type == "foreweapons"){
        $check = "isFrontWeapon";
    } else if($type == "rearweapons"){
        $check = "isRearWeapon";
    } elseif($type == "science" || $type == "engineering" || $type == "tactical"){
        $check = "isConsole";
    }

    $shipItems = json_decode(readItemCombination($shipID));
    $WeaponsArray = array();
    foreach($shipItems as $shipItem){
        if($shipItem->$check == 1){
            if($shipItem->equipmentType == $type){
                echo "Console" . $type;
                $WeaponsArray[] = "Console 1: " . $type;
            } else {
                $weaponData = json_decode(getDamageTypeByID($shipItem->damageTypeID)) . " " . json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK" . json_decode(getItemTierById($shipItem->itemTierID));
                $WeaponsArray[] = $weaponData;
            }
        }
    }
    return $WeaponsArray;
}
?>