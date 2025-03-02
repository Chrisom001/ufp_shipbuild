<?php
function viewShipItems($type, $shipID){
    $itemType = "";
    $check ="";
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

    $shipItems = json_decode(readItemCombination($shipID, $check, $itemType));
    $WeaponsArray = array();
    foreach($shipItems as $shipItem){
        if($shipItem->$check == 1){
            if($itemType == "console"){
                if($shipItem->equipmentType == $type){
                    $consoleData = json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK " . json_decode(getItemTierById($shipItem->itemTierID));
                    $WeaponsArray[] = $consoleData;
                }
            } elseif($itemType == "weapon"){
                $weaponData = json_decode(getDamageTypeByID($shipItem->damageTypeID)) . " " . json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK" . json_decode(getItemTierById($shipItem->itemTierID));
                $WeaponsArray[] = $weaponData;
            }
        }
    }
    return $WeaponsArray;
}

function weaponConsoleRepeater($shipID, $slotType, $numberOfSlots){
    $type = "";
    $result = "";
    $slotTypeText = "";
    if($slotType == "foreweapons"){
        $slotTypeText = "Fore Weapon";
    } elseif($slotType == "rearweapons"){
        $slotTypeText = "Rear Weapon";
    } elseif($slotType == "science"){
        $slotTypeText = "Science Console";
    } elseif($slotType == "engineering"){
        $slotTypeText = "Engineering Console";
    } elseif($slotType == "tactical"){
        $slotTypeText = "Tactical Console";
    }
    $itemArray = viewShipItems($slotType, $shipID);


    $sizeOfArray = count($itemArray);
    $count = 0;
    for($i=0; $i < $numberOfSlots; $i++) {
        $result .= "<div class='col'>";
        if ($count < $sizeOfArray) {
            $result .= "<p>" . $slotTypeText . $i + 1 . ": " . $itemArray[$count] . "</p>";
        } else {
            $result .= "<p>" . $slotTypeText . $i + 1 . ": " . " is empty</p>";
        }
        $result .= "</div>";
        $count++;
    }

    return $result;
}
?>