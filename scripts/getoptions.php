<?php
include "db_connection.php";
include "../model/api_ships.php";


if (isset($_POST['value'])) {
    $value = $_POST['value'];
    $ships = getShipListByTier($value);
    if ($ships) {
        foreach ($ships as $ship) {
            echo "<option value=\"{$ship['id']}\">{$ship['shipName']}</option>";
        }
    } else {
        echo "<option value=\"\">No options available</option>";
    }
}
?>