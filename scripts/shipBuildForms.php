<?php
include "model/api_shipTiers.php";
include "model/api_itemTiers.php";
include "model/api_rarity.php";
include "model/api_equipmentType.php";
include "model/api_damageType.php";
include "model/api_shipType.php";
    function shipChoice(){

        $shipTierListJson = getShipTiers();
        $usableTierList = json_decode($shipTierListJson);
        $form = "";
        if(sizeof($usableTierList) < 0){
            return "Error";
        } else {

            $form .= "<form action='addShipBuild.php' method='post'>";
            $form .= "<div class='row'>";
            $form .= "<div class='col'>";
            $form .= "<select class=form-select' aria-label='shipTierSelector' id='shipTierSelector' name='shipTierSelector'>";
            $form .= "<option value='0'>Select an option</option>";
            for($j=0;$j<sizeof($usableTierList);$j++){
                $shipTierID = $usableTierList[$j]->id;
                $shipTierText = $usableTierList[$j]->shipTier;
                if($shipTierID == 1 || $shipTierID == 2 || $shipTierID ==3||$shipTierID ==4 ||$shipTierID ==5 || $shipTierID ==6){
                    $form.= "<option value='".$shipTierID."'> Tier " . $shipTierText ."</option>";
                }
            }
            $form .= "</select>";
            $form .= "</div>";
        }

        $form .= "<div class='col'>";
        //$shipData = getShipList();
        //$usableShip = json_decode($shipData);
        //if(sizeof($usableShip) < 1){
        //    return "Error";
        //} else {
            $form .= "<select class='form-select' aria-label='ShipSelector' id='shipSelector' name='shipSelector'>";
            $form .= "<option selected>Select the type of ship</option>";
            //for ($i = 0; $i < sizeof($usableShip); $i++) {
            //    $form .= "<option value='" . $usableShip[$i]->id . "'class='".$usableShip[$i]->shipTierID."'>" . $usableShip[$i]->shipName . "</option>";
            //}
            $form .= "</select>";
            $form .= "</div>";
            $form .= "</div>";
            $form .= "<input type='submit' value='Submit'>";
            $form .= "</form>";

            return $form;
        //}
    }
    function shipWeapon($weaponLocation, $shipID){
        $weaponSlot = "";
        if($weaponLocation == "fore"){
            $weaponSlot="frontSlot";
        } elseif($weaponLocation =="rear"){
            $weaponSlot="rearSlot";
        }

        $slotNumber = json_decode(getShipWeaponSlots($shipID, $weaponSlot));
        $form = "";
        for($s = 0; $s < $slotNumber; $s++){
            $form .= '<label>'.$weaponLocation .'Weapon'. ($s + 1) . ': </label>';
            $form .= '<div class="row">';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Weapon Damage</option>';
            $getWeaponDamageType = json_decode(getAllDamageTypes());
            for($i=0;$i<sizeof($getWeaponDamageType);$i++){
                $form .= "<option value='".$getWeaponDamageType[$i]->id."'>".$getWeaponDamageType[$i]->damageType."</option>";
            }
            $form .= '</select>';
            $form .= '</div>';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Weapon Type</option>';
            $getAllWeapons = json_decode(getAllWeaponTypes());
            for($i=0;$i<sizeof($getAllWeapons);$i++){
                $form .= "<option value='".$getAllWeapons[$i]->id."'>".$getAllWeapons[$i]->equipmentName."</option>";
            }
            $form .= '</select>';
            $form .= '</div>';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Weapon Level</option>';
            $getItemTiersJson = json_decode(getItemTiers());
            for($i=0;$i<sizeof($getItemTiersJson);$i++){
                $form .= "<option value='".$getItemTiersJson[$i]->id."'> MK".$getItemTiersJson[$i]->tierLevel."</option>";
            }
            $form .= '</select>';
            $form .= '</div>';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Mod 1</option>';
            $form .= '<option value="1">ACC</option>';
            $form .= '<option value="2">ACC2</option>';
            $form .= '<option value="3">ACC3</option>';
            $form .= '</select>';
            $form .= '</div>';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Mod 2</option>';
            $form .= '<option value="1">ACC</option>';
            $form .= '<option value="2">ACC2</option>';
            $form .= '<option value="3">ACC3</option>';
            $form .= '</select>';
            $form .= '</div>';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Mod 3</option>';
            $form .= '<option value="1">ACC</option>';
            $form .= '<option value="2">ACC2</option>';
            $form .= '<option value="3">ACC3</option>';
            $form .= '</select>';
            $form .= '</div>';
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Mod 4</option>';
            $form .= '<option value="1">ACC</option>';
            $form .= '<option value="2">ACC2</option>';
            $form .= '<option value="3">ACC3</option>';
            $form .= '</select>';
            $form .= '</div>';
            $form .= '</div>';
        }

        return $form;
    }

    function shipEquip($consoleType, $slotNumber){
        $form = "";
        $form .= '<label>'.$consoleType .' console '. ($slotNumber + 1) . ': </label>';
        $form .= '<div class="row">';
        $form .= '<div class="col">';
        $form .= '<select class="form-select" aria-label="Default select example">';
        $form .= '<option selected>Console Type</option>';
        $getConsolesJson = json_decode(getAllConsoles());
        for($i=0;$i<sizeof($getConsolesJson);$i++){
            if($getConsolesJson[$i]->equipmentType == strtolower($consoleType)){
                $form .= "<option value='".$getConsolesJson[$i]->id."'>".$getConsolesJson[$i]->equipmentName."</option>";
            }
        }
        $form .= '</select>';
        $form .= '</div>';
        $form .= '<div class="col">';
        $form .= '<select class="form-select" aria-label="Default select example">';
        $form .= '<option selected>Console Level</option>';
        $getItemTiersJson = json_decode(getItemTiers());
        for($i=0;$i<sizeof($getItemTiersJson);$i++){
            $form .= "<option value='".$getItemTiersJson[$i]->id."'> MK".$getItemTiersJson[$i]->tierLevel."</option>";
        }
        $form .= '</select>';
        $form .= '</div>';
        $form .= '<div class="col">';
        $form .= '<select class="form-select" aria-label="Default select example">';
        $form .= '<option selected>Rarity</option>';
        $getItemRaritysJson = json_decode(getAllRaritys());
        for($i=0;$i<sizeof($getItemRaritysJson);$i++){
            $form .= "<option value='".$getItemRaritysJson[$i]->id."'>".$getItemRaritysJson[$i]->rarityType."</option>";
        }
        $form .= '</select>';
        $form .= '</div>';
        return $form;
    }

    function addShipWepAndConsole($shipID){
        $form = "";
        $form .= "<form action='' method='post'>";

        $form .= "<p>Enter the relevant weapons</p>";
        $form .= shipWeapon("fore", $shipID);
        $form .= shipWeapon("rear", $shipID);
        $form .= "</br>";
        $form .= "<p>Select the correct equipment for the ship</p>";
        $equipmentSlotJson = getShipEquipmentSlots($shipID);
        if($equipmentSlotJson == "Error"){
            databaseError();
        } else {
            $equipmentSlotData = json_decode($equipmentSlotJson);
            $tacSlots = $equipmentSlotData[0]->tacConsoleNum;
            $engSlots = $equipmentSlotData[0]->engConsoleNum;
            $sciSlots = $equipmentSlotData[0]->sciConsoleNum;
            $uniSlots = $equipmentSlotData[0]->universalConsoleNum;

            for($i=0; $i < $tacSlots; $i++){
                $form .= shipEquip("Tactical", $i);
            }
            for($i=0; $i < $engSlots; $i++){
                $form .= shipEquip("Engineering", $i);
            }
            for($i=0; $i < $sciSlots; $i++){
                $form .= shipEquip("Science", $i);
            }
            if($uniSlots = 0){
                $form .= "This ship doesn't have any universal slots";
            } else {
                for($i=0; $i < $uniSlots; $i++){
                    $form .= shipEquip("Universal", $i);
                }
            }
        }
        $form .= "</br>";
        $form .= "<input type='hidden' name='shipWepInput' value='true'>";
        $form .= "<input type='hidden' name='userID' value='1'>";
        $form .= "<input type='hidden' name='shipSelector' value='$shipID'>";
        $form .= "<input type='submit' value='Submit'>";
        $form .= "</form>";
        return $form;
    }
?>