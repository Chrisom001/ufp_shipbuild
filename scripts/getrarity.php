<?php
if (isset($_POST['rarityEntry'])) {
    echo "Rarity: " . $_POST['rarityEntry'];
    $value = $_POST['rarityEntry'];
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
} else {
    var_dump($_POST['rarityValue']);
    echo "Failure!!!";
}
?>
