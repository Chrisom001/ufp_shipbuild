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
        $form .= "<select class='form-select' aria-label='ShipSelector' id='shipSelector' name='shipSelector'>";
        $form .= "<option selected>Select the type of ship</option>";

        $form .= "</select>";
        $form .= "</div>";
        $form .= "</div>";
        $form .= "<input type='submit' value='Submit'>";
        $form .= "</form>";

        return $form;
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
            $weaponName = $weaponLocation ."_damage_" . $s;
            $weaponType = $weaponLocation ."_type_" . $s;
            $weaponLevel = $weaponLocation ."_level_" . $s;
            $weaponTier = $weaponLocation ."_tier_" . $s;

            $form .= "<label>".$weaponLocation ." Weapon ". ($s + 1) . ": </label>";
            $form .= "<div class='row'>";
            $form .= "<div class='col'>";
            $form .= "<select class='form-select' aria-label='Default select example' name='$weaponName' required>";
            $form .= "<option selected>Weapon Damage</option>";
            $getWeaponDamageType = json_decode(getAllDamageTypes());
            for($i=0;$i<sizeof($getWeaponDamageType);$i++){
                $form .= "<option value='".$getWeaponDamageType[$i]->id."'>".$getWeaponDamageType[$i]->damageType."</option>";
            }
            $form .= "</select>";
            $form .= "</div>";
            $form .= "<div class='col'>";
            $form .= "<select class='form-select' aria-label='Default select example' name='$weaponType' required>";
            $form .= "<option selected>Weapon Type</option>";
            $getAllWeapons = json_decode(getAllWeaponTypes());
            for($i=0;$i<sizeof($getAllWeapons);$i++){
                $form .= "<option value='".$getAllWeapons[$i]->id."'>".$getAllWeapons[$i]->equipmentName."</option>";
            }
            $form .= "</select>";
            $form .= "</div>";
            $form .= "<div class='col'>";
            $form .= "<select class='form-select' aria-label='Default select example' name='$weaponLevel' required>";
            $form .= getAllTierOptions("Weapon");
            $form .= "</select>";
            $form .= "</div>";
            $form .= "<div class='col'>";
            $form .= "<select class='form-select' aria-label='Default select example' id='weaponRaritySelector' name='$weaponTier' required>";
            $getItemRaritysJson = json_decode(getAllRaritys());
            $form .= getAllRarityOptions();
            $form .= "</select>";
            $form .= "</div>";
            $form .= "</div>";
        }

        return $form;
    }

    function shipEquip($consoleType, $slotNumber){
        $form = "";
        $form .= "<label>".$consoleType ." console ". ($slotNumber + 1) . ": </label>";
        $form .= "<div class='row'>";
        $form .= "<div class='col'>";
        $form .= "<select class='form-select' aria-label='Default select example' name='".$consoleType. "_type_" .$slotNumber."' required>";
        $form .= "<option selected>Console Type</option>";
        $getConsolesJson = json_decode(getAllConsoles());
        for($i=0;$i<sizeof($getConsolesJson);$i++){
            if($getConsolesJson[$i]->equipmentType == strtolower($consoleType)){
                $form .= "<option value='".$getConsolesJson[$i]->id."'>".$getConsolesJson[$i]->equipmentName."</option>";
            }
        }
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<select class='form-select' aria-label='Default select example' name='".$consoleType. "_tier_" .$slotNumber."' required>";
        $form .= getAllTierOptions("Console");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<select class='form-select' aria-label='Default select example' name='".$consoleType. "_rarity_" .$slotNumber."' required>";
        $form .= getAllRarityOptions();
        $form .= "</select>";
        $form .= "</div>";
        $form .= "</div>";
        return $form;
    }

    function addShipWeps($shipID){
        $form = "";
        $form .= "<p>Enter the relevant weapons</p>";
        $form .= shipWeapon("fore", $shipID);
        $form .= shipWeapon("rear", $shipID);
        $form .= "</br>";
        return $form;
    }

    function shipConsoleAdd($shipID){
        $form = "";
        $form .= "<p>Select the correct Consoles for the ship</p>";
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
        return $form;
    }

    function getAllTierOptions($item){
        $form ="";
        $form .= "<option selected>" .$item ." Level</option>";
        $getItemTiersJson = json_decode(getItemTiers());
        for($i=0;$i<sizeof($getItemTiersJson);$i++){
            $form .= "<option value='".$getItemTiersJson[$i]->id."'> MK ".$getItemTiersJson[$i]->tierLevel."</option>";
        }
        return $form;
    }

    function getAllRarityOptions(){
        $form = "";
        $form .= "<option selected>Rarity</option>";
        $getItemRaritysJson = json_decode(getAllRaritys());
        for($i=0;$i<sizeof($getItemRaritysJson);$i++){
            $form .= "<option value='".$getItemRaritysJson[$i]->id."'>".$getItemRaritysJson[$i]->rarityType."</option>";
        }
        return $form;
    }

    function shipEquipmentForm(){
        $form = "";
        $form .= "<p>Select the equipment for the ship</p>";
        $form .= "<div class='row'>";
        $form .= "<div class='col'>";
        $form .= "<label>Shields</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getEquipmentTypeList("shield");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Mark</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllTierOptions("Shield");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Rarity</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllRarityOptions();
        $form .= "</select>";
        $form .= "</div>";
        $form .= "</div>";

        $form .= "<div class='row'>";
        $form .= "<div class='col'>";
        $form .= "<label>Deflector Dish</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getEquipmentTypeList("deflector");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Mark</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllTierOptions("Deflector");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Rarity</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllRarityOptions();
        $form .= "</select>";
        $form .= "</div>";
        $form .= "</div>";

        $form .= "<div class='row'>";
        $form .= "<div class='col'>";
        $form .= "<label>Impulse Engine</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getEquipmentTypeList("impulse");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Mark</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllTierOptions("Impulse");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Rarity</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllRarityOptions();
        $form .= "</select>";
        $form .= "</div>";
        $form .= "</div>";

        $form .= "<div class='row'>";
        $form .= "<div class='col'>";
        $form .= "<label>Warp/Singulatory Core</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getEquipmentTypeList("warpcore_singularity");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Mark</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllTierOptions("Warp Core");
        $form .= "</select>";
        $form .= "</div>";
        $form .= "<div class='col'>";
        $form .= "<label>Rarity</label>";
        $form .= "<select class='form-select' aria-label='Default select example' name='equipment'>";
        $form .= getAllRarityOptions();
        $form .= "</select>";
        $form .= "</div>";
        $form .= "</div>";

        return $form;
    }

    function getEquipmentTypeList($type){
        $form ="";
        $form .= "<option selected>" .$type ." Selection</option>";
        $getItemJson = json_decode(getAllEquipments($type));
        for($i=0;$i<sizeof($getItemJson);$i++){
            $form .= "<option value='".$getItemJson[$i]->id."'> MK ".$getItemJson[$i]->equimentName."</option>";
        }
        return $form;
    }

    function tabbedShipEquipmentForm($shipID){
        $form = "";
        $form .= "<ul class='nav nav-tabs' id='myTab' role='tablist'>";
        $form .= "<li class='nav-item' role='presentation'>";
        $form .= "<button class='nav-link active' id='weapon-tab' data-bs-toggle='tab' data-bs-target='#weapon' type='button' role='tab' aria-controls='weapon' aria-selected='true'>Weapons</button>";
        $form .= "</li>";
        $form .= "<li class='nav-item' role='presentation'>";
        $form .= "<button class='nav-link' id='consoles-tab' data-bs-toggle='tab' data-bs-target='#consoles' type='button' role='tab' aria-controls='consoles' aria-selected='false'>Consoles</button>";
        $form .= "</li>";
        $form .= "<li class='nav-item' role='presentation'>";
        $form .= "<button class='nav-link' id='equipment-tab' data-bs-toggle='tab' data-bs-target='#equipment' type='button' role='tab' aria-controls='equipment' aria-selected='false'>Equipment</button>";
        $form .= "</li>";
        $form .= "<li class='nav-item' role='presentation'>";
        $form .= "<button class='nav-link' id='finaldetails-tab' data-bs-toggle='tab' data-bs-target='#finaldetails' type='button' role='tab' aria-controls='finaldetails' aria-selected='false'>Final Details</button>";
        $form .= "</li>";
        $form .= "</ul>";
        $form .= "<div class='tab-content' id='myTabContent'>";
        $form .= "<div class='tab-pane fade show active' id='weapon' role='tabpanel' aria-labelledby='weapon-tab'>".addShipWeps($shipID)."</div>";
        $form .= "<div class='tab-pane fade' id='consoles' role='tabpanel' aria-labelledby='consoles-tab'>".shipConsoleAdd($shipID)."</div>";
        $form .= "<div class='tab-pane fade' id='equipment' role='tabpanel' aria-labelledby='equipment-tab'>".shipEquipmentForm()."</div>";
        $form .= "<div class='tab-pane fade' id='finaldetails' role='tabpanel' aria-labelledby='finaldetails-tab'>".finalBasicDetails($shipID)."</div>";
        $form .= "</div>";
        return $form;
    }

    function finalBasicDetails($shipID){
        $form = "";
        $form .= "<label>Short Description</label>";
        $form .= "<textarea maxlength='250' name='shortDescription' required>";
        $form .= "Enter text here. Max of 250 characters.";
        $form .= "</textarea>";
        $form .= "</br>";
        $form .= "<label>Long Description</label>";
        $form .= "<textarea maxlength='2000' name='longDescription' required>";
        $form .= "Enter text here. Max of 2000 characters.";
        $form .= "</textarea>";
        $form .= "</br>";
        $form .= "<label>Select Faction</label>";
        $form .= "<select name='factionSelection' required>";
        $form .= "<option value=''></option>";
        $form .= "<option value='1'>Federation</option>";
        $form .= "<option value='2'>Klingon</option>";
        $form .= "<option value='3'>Romulan</option>";
        $form .= "<option value='4'>Jem'Hadar</option>";
        $form .= "<input type='hidden' name='shipWepConsoleEquipment' value='true'>";
        $form .= "<input type='hidden' name='userID' value='1'>";
        $form .= "<input type='hidden' name='shipSelector' value='$shipID'>";
        $form .= "<input type='submit' value='Submit'>";
        $form .= "</form>";
        return $form;
    }
?>