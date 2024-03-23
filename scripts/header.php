<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$navbar = "";
$navbar .= "<nav class='navbar bg-dark navbar-expand-lg bg-body-tertiary' data-bs-theme='dark'>";
$navbar .= "<div class='container-fluid'>";
$navbar .= "<a class='navbar-brand' href='#'>UFP Ship Builder Tool</a>";
$navbar .= "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
$navbar .= "<span class='navbar-toggler-icon'></span>";
$navbar .= "</button>";
$navbar .= "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
$navbar .= "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
$navbar .= "<li class='nav-item'>";
$navbar .= "<a class='nav-link active' aria-current='page' href='#'>Home</a>";
$navbar .= "</li>";
$navbar .= "<li class='nav-item'>";
$navbar .= "<a class='nav-link' href='#'>Link</a>";
$navbar .= "</li>";
$navbar .= "<li class='nav-item dropdown'>";
$navbar .= "<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
$navbar .= "Dropdown";
$navbar .= "</a>";
$navbar .= "<ul class='dropdown-menu'>";
$navbar .= "<li><a class='dropdown-item' href='#'>Action</a></li>";
$navbar .= "<li><a class='dropdown-item' href='#'>Another action</a></li>";
$navbar .= "<li><hr class='dropdown-divider'></li>";
$navbar .= "<li><a class='dropdown-item' href='#'>Something else here</a></li>";
$navbar .= "</ul>";
$navbar .= "</li>";
$navbar .= "<li class='nav-item'>";
$navbar .= "<a class='nav-link disabled' aria-disabled='true'>Disabled</a>";
$navbar .= "</li>";
$navbar .= "</ul>";
$navbar .= "<form class='d-flex' role='search'>";
$navbar .= "<input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>";
$navbar .= "<button class='btn btn-outline-success' type='submit'>Search</button>";
$navbar .= "</form>";
$navbar .= "</div>";
$navbar .= "</div>";
$navbar .= "</nav>";

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

