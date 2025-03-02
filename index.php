<?php
include "scripts/header.php";
include "model/api_shipBuild.php";
include "model/api_shipType.php";
include "model/api_users.php";
$getAllShipsJson = json_decode(getLatestShipBuilds());
$shipBuildForm = "";
for($i = 0; $i < count($getAllShipsJson); $i++) {
    $shipBuildForm .= "<div class='container text-center'>";
    $shipBuildForm .= "<div class='row'>";
    $shipBuildForm .= "<div class='col'>";
    $shipBuildForm .= "<div class='card' style='width: 18rem;'>";
    $shipBuildForm .= "<img src='userimages/". $getAllShipsJson[$i]->imageName ."' class='card-img-top' alt='...'>";
    $shipBuildForm .= "<div class='card-body'>";
    $shipBuildForm .= "<h5 class='card-title'>". $getAllShipsJson[$i]->shipName ."</h5>";
    $shipBuildForm .= "<p class='card-text'>".$getAllShipsJson[$i]->shipBuildDescription."</p>";
    $shipBuildForm .= "<ul class='list-group list-group-flush'>";
    $shipBuildForm .= "<li class='list-group-item'>Faction: " . $getAllShipsJson[$i]->shipFaction."</li>";
    $shipBuildForm .= "<li class='list-group-item'>Ship Type: ".json_decode(getShipTypeByID($getAllShipsJson[$i]->shipTypeID))."</li>";
    $shipBuildForm .= "<li class='list-group-item'>Tier Level</li>";
    $shipBuildForm .= "<li class='list-group-item'>Created by: ".json_decode(checkUsernameByID($getAllShipsJson[$i]->userID))."</li>";
    $shipBuildForm .= "</ul>";
    $shipBuildForm .= " <a href='buildview.php?id=".$getAllShipsJson[$i]->id."' class='btn btn-primary'>View this build</a>";
    $shipBuildForm .= "</div>";
    $shipBuildForm .= "</div>";
    $shipBuildForm .= "</div>";
    $shipBuildForm .= "</div>";
    $shipBuildForm .= "</div>";
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
</head>
<body>
<?php echo $navbar; ?>
<div class="container">
    <!-- Content here -->
    <h1>Welcome to the new site</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lorem enim, consectetur eu tristique ut, vestibulum eu ipsum. Vestibulum vitae bibendum purus. Fusce id risus erat. Nulla id pellentesque mauris. Sed at leo tempor, gravida arcu ullamcorper, volutpat erat. Quisque ut sem feugiat, lacinia elit vel, blandit enim. Morbi facilisis varius velit eu porta. Integer at diam justo. Aenean eget tempus nulla, nec semper neque. Aenean ac erat lectus. Praesent quam elit, efficitur non volutpat ut, dignissim at turpis. Suspendisse cursus accumsan risus sit amet cursus. Curabitur at erat mattis, varius ante vitae, feugiat orci. Vestibulum finibus placerat ligula id pulvinar. Aenean in dolor sit amet mauris gravida molestie ut ac turpis.</p>
    <p>Nam scelerisque erat vestibulum nunc imperdiet convallis. Aliquam erat volutpat. Pellentesque interdum libero metus, id feugiat turpis dapibus at. Sed sollicitudin venenatis massa, vel scelerisque enim facilisis nec. Sed turpis nisl, iaculis ac magna quis, mattis cursus dolor. Aliquam sapien ex, scelerisque tempus elit sit amet, tempus porttitor massa. Nullam sodales euismod bibendum. Sed gravida erat ac enim finibus finibus. Curabitur nec fringilla urna. Maecenas laoreet dui eget ultricies tincidunt. Vivamus vel semper purus. Aenean elementum auctor quam, in dictum metus consequat ut. Etiam ullamcorper quam gravida enim scelerisque scelerisque.</p>

    <div class="container">
        <!-- Content here -->
        <h2>Latest Builds</h2>
        <?php
        echo $shipBuildForm;
        ?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>