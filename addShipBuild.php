<?php
include "scripts/db_connection.php";
include "scripts/header.php";
include "scripts/shipBuildForms.php";
include "model/api_shipType.php";
include "model/api_ships.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UFP Ship Builder Tool (Dev)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--- Stylesheet include -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php echo $navbar; ?>
<div class="container">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id pulvinar erat. Vivamus fringilla odio in elementum porta. Fusce fermentum augue vitae mauris fermentum interdum. Nulla fringilla sagittis volutpat. Aenean fermentum nisl non posuere suscipit. Quisque pulvinar interdum felis, ut fringilla nisi placerat ac. Quisque at nisi massa. Pellentesque imperdiet vel eros vel condimentum.</p>
    <p>Curabitur fermentum ut massa sed molestie. Proin et laoreet urna. Mauris id justo molestie, consequat augue et, consequat risus. Sed vel vehicula turpis. Nulla consectetur, ipsum et condimentum aliquet, nisi ante ornare orci, ac rhoncus felis arcu a magna. Donec feugiat, risus in aliquet varius, turpis ligula bibendum odio, quis feugiat lectus leo facilisis felis. Pellentesque eu auctor nulla, eget dignissim urna. Curabitur ac nisi ut diam pharetra mattis vitae ornare enim. Nullam luctus efficitur ipsum, sed imperdiet felis dapibus ut. Pellentesque tristique lacinia mollis. Ut nec magna libero. Fusce dictum elementum fringilla. Praesent porttitor accumsan dapibus. Curabitur viverra imperdiet semper. Mauris quis sodales purus. Praesent id bibendum arcu.</p>
    <p>Select the options for your build below:</p>
    <?php
    if(!isset($_POST['shipSelector'])){
        echo shipChoice();
    } else {
        echo "<p>Enter the relevant weapons</p>";

        $weaponSlotJson = getShipWeaponSlots($_POST['shipSelector']);
        if($weaponSlotJson == "Error"){
            echo "There has been error, please alert technical support";
        } else {
            $weaponSlotData = json_decode($weaponSlotJson, true);
            $fore = $weaponSlotData["frontSlot"];
            $rear = $weaponSlotData["rearSlot"];

            for($i=0; $i < $fore; $i++){
                echo shipWeapon("Fore", $i);
            }
            for($j=0; $j < $rear; $j++) {
                echo shipWeapon("Rear", $j);
            }
        }

    }


        ?>

    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>