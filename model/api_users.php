<?php
//include "../scripts/db_connection.php";
$db = new dbObj();
$pdo =  $db->getConnstring();

function checkUser($userName, $password){
    global $pdo;

    $checkUserSQL = "SELECT * FROM GW_Users WHERE userName = :userName AND password = :password";

    $statement = $pdo -> prepare($checkUserSQL);

    $success = $statement -> execute ([
        "userName" => $userName
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode("True");
    } else {
        return json_encode("False");
    }
}

function roleCheck($userName){
    global $pdo;
    $checkUserRole = "SELECT role FROM GW_Users WHERE userName = '$userName'";
    $check = $pdo -> prepare($checkUserRole);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}

function checkUsername($userName)
{
    global $pdo;

    $checkUsernameSQL = "SELECT * FROM GW_Users WHERE userName = :userName";
    $statement = $pdo -> prepare($checkUsernameSQL);

    $success = $statement -> execute ([
        "userName" => $userName
    ]);

    if($success && $statement -> rowCount() > 0){
        return json_encode("True");
    } else {
        return json_encode("False");
    }
}

function checkUsernameByID($id)
{
    global $pdo;

    $checkUsernameSQL = "SELECT userName FROM GW_Users WHERE userID = $id";
    $check = $pdo -> prepare($checkUsernameSQL);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}

function getUserIDByUsername($userName){
    global $pdo;
    $checkUserIDSQL = "SELECT userID FROM GW_Users WHERE userName = '$userName'";

    $check = $pdo -> prepare($checkUserIDSQL);
    $check -> execute();
    $checkResult = $check -> fetchcolumn();

    return json_encode($checkResult);
}
?>