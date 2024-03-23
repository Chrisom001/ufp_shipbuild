<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$navbar = "";
/*$navbar = "";
$navbar .= '<nav class='navbar navbar-expand-lg bg-body-tertiary'>';
$navbar .= '<div class='container-fluid'>';
$navbar .= '<a class='navbar-brand' href='#">UFP Ship Build Tool</a>";
$navbar .= "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'"'>";
$navbar .= "<span class='navbar-toggler-icon'></span>";
$navbar .= "</button>";
$navbar .= "<div class='collapse navbar-collapse' id='navbarNavAltMarkup'>";
$navbar .= "<div class='navbar-nav'>";
$navbar .= "<a class='nav-link active' aria-current='page' href='#'>Home</a>";
$navbar .= "<a class='nav-link' href='#'>Test Link 1</a>";
$navbar .= "<a class='nav-link' href='#'>Test Link 2</a>";
$navbar .= "<a class='nav-link disabled' aria-disabled='true'>Disabled</a>";

$navbar .= "</div>";
$navbar .= "</div>";
$navbar .= "</div>";
$navbar .= "<div class='form-inline'>";

if(!isset($_SESSION) || empty($_SESSION)){
    $navbar .= "<a href='register.php'>Register</a> | <a href='login.php'>Login</a>";
} elseif ($_SESSION['user'][0] == "failed"){
    $navbar .= "<a href='register.php'>Register</a> | <a href='login.php'>Login</a>";
} else {
    $navbar .= "Welcome " . $_SESSION['user'][0] . " | ";
    if($_SESSION['user'][1] == "contributor"){
        $navbar .= "<a href='addArticle.php'>Add an Article</a> | ";
    } else if($_SESSION['user'][1] == "admin"){
        $navbar .= "<a href='addArticle.php'>Add an Article</a> |  ";
    }
    $navbar .= "<a href='logout.php'>Logout</a>";
}
$navbar .= "</div>";
$navbar .= "</nav>";*/
?>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </div>
        </div>
    </div>
</nav>
