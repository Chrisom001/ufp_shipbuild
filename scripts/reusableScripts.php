<?php
function viewShipItems($type, $shipID){
    if($type == "foreweapons"){
        $check = "isFrontWeapon";
    } else if($type == "rearweapons"){
        $check = "isRearWeapon";
    }
    $shipItems = json_decode(readItemCombination($shipID));
    $WeaponsArray = array();
    foreach($shipItems as $shipItem){
        if($shipItem->$check == 1){
            $weaponData = json_decode(getDamageTypeByID($shipItem->damageTypeID)) . " " . json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK" . json_decode(getItemTierById($shipItem->itemTierID));
            $WeaponsArray[] = $weaponData;
        }
    }
    return $WeaponsArray;
}
?>