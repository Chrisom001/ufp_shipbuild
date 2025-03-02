<?php
include "scripts/header.php";
include "scripts/reusableScripts.php";
include "model/api_ships.php";

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
            $imageLocation = $shipBuildDetails[0]->imageName;
            $shipLongDescription = $shipBuildDetails[0]->shipBuildLongText;
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
    <h1 style="text-align: center"><?php echo $shipName; ?> by <?php echo $userName ?></h1>
    <?php
    if($imageLocation != ""){
        echo "<img src='userimages/$imageLocation' alt='Ship Image' style='width: 500px; height: 500px; align-content: center;'>";
    }
    ?>
    <p><?php echo $shipLongDescription?></p>

    <div class="row">
        <div class="col">
            <p>This section will show the weapons attached to this ship</p>
            <div class="row">
            <?php
            $result = weaponConsoleRepeater($id, "foreweapons");
            echo $result;
            ?>
            </div>
            <br/>
            <div class="row">
            <?php
            $result = weaponConsoleRepeater($id, "rearweapons");
            echo $result;
            ?>
            </div>
        </div>
        <div class="col">
            <p>This section will show the Consoles attached to this ship</p>
            <?php

            //$result = weaponConsoleRepeater($id, "uni");
            //echo $result;
            ?>
                <div class="row">
                    <?php
                    $result = weaponConsoleRepeater($id, "tactical");
                    echo $result;
                    ?>
                </div>
                <div class="row">
                    <?php
                    $result = weaponConsoleRepeater($id, "engineering");
                    echo $result;
                    ?>
                </div>
                <div class="row">
                    <?php
                    $result = weaponConsoleRepeater($id, "science");
                    echo $result;
                    ?>
                </div>
            </div>
        </div>
    <p>Seating for the ship will go here</p>
    <?php
    $result = getBridgeOfficerSlots($id);
    echo $result;
    ?>
<!--    <p>Slot1:Type Here</p>-->
<!--    <div class="row">-->
<!--        <div class="col">Officer Power 1</div>-->
<!--        <div class="col">Officer Power 2</div>-->
<!--        <div class="col">Officer Power 3</div>-->
<!--        <div class="col">Officer Power 4</div>-->
<!--    </div>-->
<!--    <p>Slot2:Type Here</p>-->
<!--    <div class="row">-->
<!--        <div class="col">Officer Power 1</div>-->
<!--        <div class="col">Officer Power 2</div>-->
<!--        <div class="col">Officer Power 3</div>-->
<!--        <div class="col">Officer Power 4</div>-->
<!--    </div>-->
<!--    <p>Slot3:Type Here</p>-->
<!--    <div class="row">-->
<!--        <div class="col">Officer Power 1</div>-->
<!--        <div class="col">Officer Power 2</div>-->
<!--        <div class="col">Officer Power 3</div>-->
<!--        <div class="col">Officer Power 4</div>-->
<!--    </div>-->
<!--    <p>Slot4:Type Here</p>-->
<!--    <div class="row">-->
<!--        <div class="col">Officer Power 1</div>-->
<!--        <div class="col">Officer Power 2</div>-->
<!--        <div class="col">Officer Power 3</div>-->
<!--        <div class="col">Officer Power 4</div>-->
<!--    </div>-->
<!--    <p>Slot5:Type Here</p>-->
<!--    <div class="row">-->
<!--        <div class="col">Officer Power 1</div>-->
<!--        <div class="col">Officer Power 2</div>-->
<!--        <div class="col">Officer Power 3</div>-->
<!--        <div class="col">Officer Power 4</div>-->
<!--    </div>-->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>