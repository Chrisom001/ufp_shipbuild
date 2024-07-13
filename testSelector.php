<?php
include "scripts/db_connection.php";
include "scripts/shipBuildForms.php";
include "model/api_shipType.php";
include "model/api_ships.php";
include "model/api_itemTiers.php";
include "model/api_shipTiers.php";
global $pdo;

$shipTierListJson = getShipTiers();
$usableTierList = json_decode($shipTierListJson);
$form = "";
if(sizeof($usableTierList) < 0){
    return "Error";
} else {

    $form .= "<form action='addShipBuild.php' method='post'>";
    $form .= "<div class='row'>";
    $form .= "<div class='col'>";
    $form .= "<select class=form-select' aria-label='shipTierSelector' id='shipTierSelector' name='shipTierSelector' onclick='sendRecords()'>";
    for ($j = 0; $j < sizeof($usableTierList); $j++) {
        $shipTierID = $usableTierList[$j]->id;
        $shipTierText = $usableTierList[$j]->shipTier;
        if ($shipTierID == 1 || $shipTierID == 2 || $shipTierID == 3 || $shipTierID == 4 || $shipTierID == 5 || $shipTierID == 6) {
            $form .= "<option value='" . $shipTierID . "'> Tier " . $shipTierText . "</option>";
        }
    }
}
$form .= "</select>";
$form .= "</div>";
$form .= "</div>";

?>
<html>
<body>
<script>
    function sendRecords() {
        // Creating XMLHttpRequest object
        var zhttp = new XMLHttpRequest();

        // JSON document
        const mParameters = {
            title: document.querySelector('#shipTierSelector').value
        }
        // Creating call back function
        zhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 201) {
                document.getElementById("example").innerHTML = this.responseText;
                console.log("Data Posted Successfully")
            }
            console.log("Error found")
        };
        // Post/Add JSON document on the given API
        zhttp.open("POST", "https://ufp.chriswilkinson.uk/testSelector.php", true);

        // Setting HTTP request header
        zhttp.setRequestHeader('Content-type', 'application/json')

        // Sending the request to the server
        zhttp.send(JSON.stringify(mParameters));
    }
</script>

<!--Creating simple form-->
<!--<h2>Enter data</h2>
<label for="Utitle">Title</label>
<input id="Utitle" type="text" name="title"><br>

<label for="UId">UserId</label>
<input id="UId" type="number" name="UserID"><br>

<label for="Ubody">Body</label>
<input id="Ubody" type="text" name="body"><br>

<button type="button" onclick="sendRecords()">Submit</button>
<div id="example"></div>-->
<?php
echo $form;
?>
</body>
</html>