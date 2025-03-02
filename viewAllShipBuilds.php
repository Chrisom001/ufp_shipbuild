<?php
include "scripts/header.php";
include "scripts/pagination.php";
include "scripts/reusableScripts.php";

//This controls the paginations current page, how many pages there will be and hte offset for the SQL query
$currentPage = "0";
$limit = 6;
//This works out the number of pages required based on the limit and the ID of the article.
$numOfPages = 0;
//This checks if there is a page number set in the URL, if there is it then sets that as current page
//Otherwise it assumes it's page 1 and sets currentpage as 1.
if(isset($_GET["page"])){
    $currentPage = $_GET["page"];
} else {
    $currentPage = 1;
}
//This takes the Current Page number and Limit to work out the offset required for that page.
$offset = getOffset($currentPage, $limit);
$paginationOutput = "";


$shipBuildtxt = getAllShipBuilds($offset);
$numOfPages = getNumberOfPaginationPagesArticles($limit, null);
$paginationOutput = displayPagination(null, $currentPage, $numOfPages, "article");
//This uses the ID, Current Page Number and Number of Pages to generate the pagination bar for the bottom of the page


$shipBuildForm = "";
$artCount = 0;  //This starts a counter to record how many articles have been displayed
$artRow = 1;	//This shows how far the row counter is.

$shipBuildjson = json_decode($shipBuildtxt);

if (sizeof($shipBuildjson) < 1){
    $shipBuildForm .= "There were no ship builds found";
} else {
    for ($i=0; $i<sizeof($shipBuildjson); $i++){
        $artCount++;
        if($artCount == 1 || $artCount == $artRow + 3){
            $shipBuildForm .= "<div class='row'>";
            if($artCount != 1){
                $artRow = $artRow + 3;
            }
        }

        $shipBuildForm .= shipCardBuilder($shipBuildjson[$i]);
        //This checks if the article ID can be divided by three, as if it can be, then a new row needs to be started.
        if($artCount == 3) {
            $shipBuildForm .= "</div> <hr>";
        }
    }
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
    <?php echo $shipBuildForm ?>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<footer class="footer">
    <?php include "scripts/footer.php"; ?>
</footer>
</html>