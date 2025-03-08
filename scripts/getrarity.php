<?php
//include "../model/api_rarity.php";
//if (isset($_POST['value'])) {
//    echo "Rarity: " . $_POST['value'];
//    $value = $_POST['value'];
    //echo "Rarity: " . $value . "<br>";
//    $numOfModifiers = 2;
//    echo "Number of modifiers : ".$numOfModifiers;
//    var_dump($numOfModifiers);
//    if ($numOfModifiers > 0) {
//        for($i = 0; $i < $numOfModifiers; $i++) {
//            echo '<div class="col">';
//            echo '<select class="form-select" aria-label="Default select example">';
//            echo '<option selected>Mod 1</option>';
//            echo '<option value="1">ACC</option>';
//            echo '<option value="2">ACC2</option>';
//            echo '<option value="3">ACC3</option>';
//            echo '</select>';
//            echo '</div>';
//        }
//    } else {
//        echo '<div class="col">';
//        echo '<select class="form-select" aria-label="Default select example">';
//        echo '<option selected value='-1'>No modifiers available</option>';
//        echo '</select>';
//        echo '</div>';
//    }
//} else {
//    var_dump($_POST['value']);
//    echo "Failure!!!";/
//}

//if (isset($_POST['value'])) {
//    $value = $_POST['value'];
//    if ($value == 0) {
//        echo "<option value=\"\">Please select a tier</option>";
//    } else {
//        $ships = getShipListByTier($value);
//        if ($ships) {
//            foreach ($ships as $ship) {
//                echo "<option value=\"{$ship['id']}\">{$ship['shipName']}</option>";
//            }
//        } else {
//            echo "<option value='0'>No options available</option>";
//        }
//    }
//}

if(isset($_POST['value'])){
    echo "Value: ".$_POST['value'];
} else {
    echo "No value seen";
}
?>
