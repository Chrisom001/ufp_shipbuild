<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function getModifiersByID($id){
    global $pdo;
    $readModifiersSQL = "SELECT * FROM modifierData WHERE id = $id";

    $readModifiersQuery = $pdo -> query($readModifiersSQL);
    $readModifiers = $readModifiersQuery -> fetchAll(PDO::FETCH_OBJ);

    return json_encode($readModifiers);
}
?>