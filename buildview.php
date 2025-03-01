<?php
include "scripts/header.php";
include "model/api_shipBuild.php";
include "model/api_itemCombination.php";
include "model/api_users.php";
include "model/api_ships.php";
include "model/api_shipType.php";
include "model/api_equipmentType.php";
include "model/api_damageType.php";
include "model/api_itemTiers.php";
include "scripts/reusableScripts.php";

if(!isset($_GET["id"])){
    header("Location: index.php");
} else {
    $id = $_GET["id"];
    if (!is_numeric($id)) {
        header("Location: index.php");
    } else {
        if (json_decode(checkIfBuildExists($id)) == "False") {
            header("Location: index.php");
        } else {
            $shipBuildDetails = json_decode(getShipBuildByID($id));
            $shipID = $shipBuildDetails[0]->shipID;
            $shipName = json_decode(getShipClassName($shipID));
            $userName = json_decode(getUserNameByID($shipBuildDetails[0]->userID));
            $shipLongDescription = $shipBuildDetails[0]->shipBuildLongText;
            $shipItemJson = json_decode(readItemCombination($id));
            $weaponSlotJson = getShipWeaponSlots($shipID);
            $weaponSlotData = json_decode($weaponSlotJson);
            $fore = $weaponSlotData[0]->frontSlot;
            $rear = $weaponSlotData[0]->rearSlot;
            $consoleSlotJson = json_decode(getConsoleSlotsByShipTypeID($shipID));
            $engConsoleSlots = $consoleSlotJson[0]->engConsoleNum;
            $sciConsoleSlots = $consoleSlotJson[0]->sciConsoleNum;
            $tacConsoleSlots = $consoleSlotJson[0]->tacConsoleNum;
            $uniConsoleSlots = $consoleSlotJson[0]->universalConsoleNum;
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UFP Ship Builder Tool (Dev) - Ship Build</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--- Stylesheet include -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php echo $navbar; ?>
<div class="container">
<!-- Content Here -->
    <h1><?php echo $shipName; ?> by <?php echo $userName ?></h1>
    <p><?php echo $shipLongDescription?></p>

    <div class="row">
        <div class="col">
            <p>This section will show the weapons attached to this ship</p>
            <div class="row">
                <?php
                    $WeaponsArray = viewShipItems("foreweapons", $id);
                    //$shipItems = json_decode(readItemCombination($id));
                    //$WeaponsArray = array();
                //foreach($shipItems as $shipItem){
                    //if($shipItem->isFrontWeapon == 1){
                        //$weaponData = json_decode(getDamageTypeByID($shipItem->damageTypeID)) . " " . json_decode(getEquipmentNameById($shipItem->equipmentTypeID)) . " MK" . json_decode(getItemTierById($shipItem->itemTierID));
                        //$WeaponsArray[] = $weaponData;
                    //}
                //}
                $sizeOfArray = count($WeaponsArray);
                $count = 0;
                for($i=0; $i < $fore; $i++){
                    echo "<div class='col'>";
                    if($count < $sizeOfArray){
                        echo "<p>Fore Weapon " . $i+1 . $WeaponsArray[$count] ."</p>";
                    } else {
                        echo "<p>Fore Weapon " . $i+1 . " is empty</p>";
                    }
                    echo "</div>";
                    $count++;
                    }
                ?>
            </div>
            <br/>
            <div class="row">
                <?php
                    for($i=0; $i < $rear; $i++){
                        echo "<div class='col'>";
                        echo "<p>Rear Weapon " . $i+1 . "</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <div class="col">
            <p>This section will show the Consoles attached to this ship</p>
            <?php
                if($uniConsoleSlots > 0){
                    echo "<div class='row'>";
                    echo "<div class='col'>";
                    echo "<p>Universal Consoles:</p>";
                    echo "</div>";
                    for($i=0; $i < $uniConsoleSlots; $i++){
                        echo "<div class='col'>";
                        echo "<p>Universal console " . $i+1 . "</p>";
                        echo "</div>";
                    }
                }
            ?>
                <div class="row">
                    <?php
                    for($i=0; $i < $tacConsoleSlots; $i++){
                        echo "<div class='col'>";
                        echo "<p>Tactical console " . $i+1 . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="row">
                    <?php
                    for($i=0; $i < $engConsoleSlots; $i++){
                        echo "<div class='col'>";
                        echo "<p>Engineering Console " . $i+1 . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="row">
                    <?php
                    for($i=0; $i < $sciConsoleSlots; $i++){
                        echo "<div class='col'>";
                        echo "<p>Science Console " . $i+1 . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <p>Seating for the ship will go here</p>
    <p>Slot1:Type Here</p>
    <div class="row">
        <div class="col">Officer Power 1</div>
        <div class="col">Officer Power 2</div>
        <div class="col">Officer Power 3</div>
        <div class="col">Officer Power 4</div>
    </div>
    <p>Slot2:Type Here</p>
    <div class="row">
        <div class="col">Officer Power 1</div>
        <div class="col">Officer Power 2</div>
        <div class="col">Officer Power 3</div>
        <div class="col">Officer Power 4</div>
    </div>
    <p>Slot3:Type Here</p>
    <div class="row">
        <div class="col">Officer Power 1</div>
        <div class="col">Officer Power 2</div>
        <div class="col">Officer Power 3</div>
        <div class="col">Officer Power 4</div>
    </div>
    <p>Slot4:Type Here</p>
    <div class="row">
        <div class="col">Officer Power 1</div>
        <div class="col">Officer Power 2</div>
        <div class="col">Officer Power 3</div>
        <div class="col">Officer Power 4</div>
    </div>
    <p>Slot5:Type Here</p>
    <div class="row">
        <div class="col">Officer Power 1</div>
        <div class="col">Officer Power 2</div>
        <div class="col">Officer Power 3</div>
        <div class="col">Officer Power 4</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>