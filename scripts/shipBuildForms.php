<?php
    include "../model/api_ships.php";
    function shipChoice(){
        $shipData = getShipList();
        $usableShip = json_decode($shipData);

        if(sizeof($usableShip) < 1){
            return "Error";
        } else {
            $form = "";
            $form .= "<form action='addShipBuild.php' method='post'>";
            $form .= "<select class='form-select' aria-label='ShipSelector' id='shipSelector' name='shipSelector'>";
            $form .= "<option selected>Select the type of ship</option>";
            for($i=0;$i<sizeof($usableShip);$i++){
                $form .= "<option value='".$usableShip[$i]->id."'>".$usableShip[$i]->shipName."</option>";
            }
            $form .= "</select>";
            $form .= "<input type='submit' value='Submit'>";
            $form .= "</form>";
            return $form;
        }
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
        $form .= '<option value="1">Mk I</option>';
        $form .= '<option value="2">Mk II</option>';
        $form .= '<option value="3">Mk III</option>';
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