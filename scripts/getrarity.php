<?php
if (isset($_POST['rarityValue'])) {
    echo "Rarity: " . $_POST['rarityValue'];
    $value = $_POST['rarityValue'];
    $numOfModifiers = json_decode(getNumberOfModifiersByID($value));
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
    }
}
?>
