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
    } elseif($type == "science" || $type == "engineering" || $type == "tactical" || $type =="universal"){
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

function weaponConsoleRepeater($shipID, $slotType){
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
    } elseif($slotType == "uni"){
        $slotTypeText = "Universal Console";
    }
    $itemArray = viewShipItems($slotType, $shipID);
    $slotArray = getNumberOfSlots($shipID);
    $sizeOfArray = count($itemArray);
    $count = 0;
    echo getNumSlotsFromArray($slotArray, $slotType);
    for($i=0; $i < getNumSlotsFromArray($slotArray, $slotType); $i++) {
        $result .= "<div class='col'>";
        if ($count < $sizeOfArray) {
            $result .= "<p>" . $slotTypeText . ($i + 1) . ": " . $itemArray[$count] . "</p>";
        } else {
            $result .= "<p>" . $slotTypeText . ($i + 1) . ": " . " is empty</p>";
        }
        $result .= "</div>";
        $count++;
    }

    return $result;
}

function getNumSlotsFromArray($slotArray, $type){
    for($i = 0; $i < count($slotArray); $i++){
        if($slotArray[$i]["type"] == $type){
            return $slotArray[$i]["value"];
        }
    }
}

function getNumberOfSlots($shipID){
    $weaponSlotData = json_decode(getShipWeaponSlots($shipID));
    $consoleSlotJson = json_decode(getConsoleSlotsByShipTypeID($shipID));
    $officeSlotJson = "";

    $slotArray = array();
    $slotArray[] = array("type" => "foreweapons", "value" => $weaponSlotData[0]->frontSlot);
    $slotArray[] = array("type" => "rearweapons", "value" => $weaponSlotData[0]->rearSlot);
    $slotArray[] = array("type" => "engineering", "value" => $consoleSlotJson[0]->engConsoleNum);
    $slotArray[] = array("type" => "science", "value" => $consoleSlotJson[0]->sciConsoleNum);
    $slotArray[] = array("type" => "tactical", "value" => $consoleSlotJson[0]->tacConsoleNum);
    $slotArray[] = array("type" => "uniConsole", "value" => $consoleSlotJson[0]->universalConsoleNum);

    return $slotArray;
}
?>