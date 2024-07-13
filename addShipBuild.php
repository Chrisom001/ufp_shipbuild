<?php
include "scripts/db_connection.php";
include "scripts/header.php";
include "scripts/shipBuildForms.php";
include "model/api_shipType.php";
include "model/api_ships.php";
include "model/api_itemTiers.php";
include "model/api_shipTiers.php";

function databaseError(){
    echo "Please alert technical support of this error";
}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        $shipID = $_POST['shipSelector'];
        echo $shipID;
        if($shipID == 0){
            echo shipChoice();
        } else {
            echo "<p>Enter the relevant weapons</p>";

            $weaponSlotJson = getShipWeaponSlots($shipID);
            if($weaponSlotJson == "Error"){
                databaseError();
            } else {

                $weaponSlotData = json_decode($weaponSlotJson);

                $fore = $weaponSlotData[0]-> frontSlot;
                $rear = $weaponSlotData[0]-> rearSlot;

                for($i=0; $i < $fore; $i++){
                    echo shipWeapon("Fore", $i);
                }
                for($j=0; $j < $rear; $j++) {
                    echo shipWeapon("Rear", $j);
                }
                echo "</br>";
                echo "<p>Select the correct equipment for the ship</p>";
                $equipmentSlotJson = getShipEquipmentSlots($shipID);
                if($equipmentSlotJson == "Error"){
                    databaseError();
                } else {
                    $equipmentSlotData = json_decode($equipmentSlotJson);
                    $tacSlots = $equipmentSlotData[0]->tacConsoleNum;
                    $engSlots = $equipmentSlotData[0]->engConsoleNum;
                    $sciSlots = $equipmentSlotData[0]->sciConsoleNum;
                    $uniSlots = $equipmentSlotData[0]->universalConsoleNum;

                    for($i=0; $i < $tacSlots; $i++){
                        echo shipEquip("Tactical", $i);
                    }
                    for($i=0; $i < $engSlots; $i++){
                        echo shipEquip("Engineering", $i);
                    }
                    for($i=0; $i < $sciSlots; $i++){
                        echo shipEquip("Science", $i);
                    }
                    if($uniSlots = 0){
                        echo "This ship doesn't have any universal slots";
                    } else {
                        for($i=0; $i < $uniSlots; $i++){
                            echo shipEquip("Universal", $i);
                        }
                    }

                }

            }
        }

    }
        ?>

    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#shipTierSelector').change(function() {
            var selectedValue = $(this).val();

            $.ajax({
                url: 'scripts/getoptions.php',
                type: 'POST',
                data: { value: selectedValue },
                success: function(response) {
                    $('#shipSelector').html(response);
                }
            });
        });
    });
</script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>