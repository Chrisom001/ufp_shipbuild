<?php
include "db_connection.php";
include "../model/api_ships.php";


if (isset($_POST['value'])) {
    $value = $_POST['value'];
    if($value == 0){
        echo "<option value=\"\">Please select a tier</option>";
    } else {
        $ships = getShipListByTier($value);
        if ($ships) {
            foreach ($ships as $ship) {
                echo "<option value=\"{$ship['id']}\">{$ship['shipName']}</option>";
            }
        } else {
            echo "<option value='0'>No options available</option>";
        }
    }
} elseif(isset($_POST['rarityEntry'])){
    echo "Rarity: " . $_POST['rarityValue'];
    $value = $_POST['rarityValue'];
    $numOfModifiers = json_decode(getNumberOfModifiersByID($value));
    var_dump($numOfModifiers);
    if ($numOfModifiers > 0) {
        for($i = 0; $i < $numOfModifiers; $i++) {
            $form .= '<div class="col">';
            $form .= '<select class="form-select" aria-label="Default select example">';
            $form .= '<option selected>Mod 1</option>';
            $form .= '<option value="1">ACC</option>';
            $form .= '<option value="2">ACC2</option>';
            $form .= '<option value="3">ACC3</option>';
            $form .= '</select>';
            $form .= '</div>';
        }
    } else {
        $form .= '<div class="col">';
        $form .= '<select class="form-select" aria-label="Default select example">';
        $form .= '<option selected>No modifiers available</option>';
        $form .= '</select>';
        $form .= '</div>';
    }
}
?>