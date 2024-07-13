<?php
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
            for($j=0;$j<sizeof($usableTierList);$j++){
                $shipTierID = $usableTierList[$j]->id;
                $shipTierText = $usableTierList[$j]->shipTier;
                if($shipTierID == 1 || $shipTierID == 2 || $shipTierID ==3||$shipTierID ==4 ||$shipTierID ==5 || $shipTierID ==6){
                    $form.= "<option value='".$shipTierID."'> Tier " . $shipTierText ."</option>";
                }
                //if($usableTierList[$j]->shipTier != "6-X" || $usableTierList[$j]->shipTier != "6-2X" || $usableTierList[$j]->shipTier != "5-U"){
                //    echo "Value: " . $usableTierList[$j]->shipTier . "is fine";
                //    $form.= "<option value='".$usableTierList[$j]->id."'> Tier " . $usableTierList[$j]->shipTier ."</option>";
                //}
            }
            $form .= "</select>";
            $form .= "</div>";
            $form .= "</div>";
        }


        //$form .= "<div class='col'>";
        /*$shipData = getShipList();
        $usableShip = json_decode($shipData);
        if(sizeof($usableShip) < 1){
            return "Error";
        } else {
            $form .= "<select class='form-select' aria-label='ShipSelector' id='shipSelector' name='shipSelector'>";
            $form .= "<option selected>Select the type of ship</option>";
            for ($i = 0; $i < sizeof($usableShip); $i++) {
                $form .= "<option value='" . $usableShip[$i]->id . "'>" . $usableShip[$i]->shipName . "</option>";
            }
            $form .= "</select>";
            $form .= "</div>";
            $form .= "</div>";
            $form .= "<input type='submit' value='Submit'>";
            $form .= "</form>";*/

            return $form;
        //}
    }
    function shipWeapon($weaponLocation, $slotNumber){
        $form = "";
        $form .= '<label>'.$weaponLocation .'Weapon'. $slotNumber + 1 . ': </label>';
        $form .= '<div class="row">';
        $form .= '<div class="col">';
        $form .= '<select class="form-select" aria-label="Default select example">';
        $form .= '<option selected>Weapon Damage</option>';
        $form .= '<option value="1">Phaser</option>';
        $form .= '<option value="2">Maser</option>';
        $form .= '<option value="3">Quaser</option>';
        $form .= '</select>';
        $form .= '</div>';
        $form .= '<div class="col">';
        $form .= '<select class="form-select" aria-label="Default select example">';
        $form .= '<option selected>Weapon Type</option>';
        $form .= '<option value="1">Beam Array</option>';
        $form .= '<option value="2">Cannon</option>';
        $form .= '<option value="3">Torpedo</option>';
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

        return $form;
    }

    function shipTacticalEquipment(){

    }

    function shipEngineeringEquipment(){

    }

    function shipScienceEquipment(){

    }
?>