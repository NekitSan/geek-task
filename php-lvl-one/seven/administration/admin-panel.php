<?php
session_start();
require_once("components/index.php");
$userRole = $_SESSION['role'] ?? null;
if($userRole != "admin")
{
        exit("<meta http-equiv='refresh' content='0; url= ../catalog.php'>");
}

switch ($_GET['page']) {
    case "admin-panel--add":
        joinContent('header');
        echo "<div class='wrapper'><main>";
        require_once("components/elements/forms/add.php");
        echo "</main></div>";
        joinContent('footer');
    break;
    case "admin-panel--edit":
        joinContent('header');
        echo "<div class='wrapper'><main>";
        require_once("components/elements/forms/edit.php");
        echo "</main></div>";
        joinContent('footer');
    break;
    case "admin-panel--dell":
        require_once("components/requests/forms/dell.php");
    break;
    case "admin-panel--tovar":
        joinContent('header');
        echo "<div class='wrapper'><main>";
        require_once("components/elements/viewing.php");
        echo "</main></div>";
        joinContent('footer');
    break;
    case "admin-panel--photo":
        joinContent('header');
        echo "<div class='wrapper'><main>";
        require_once("components/elements/photo.php");
        echo "</main></div>";
        joinContent('footer');
    break;
    case "admin-panel--branch":
        joinContent('header');
        echo "<div class='wrapper tables'><main>";
        require_once("components/elements/branch.php");
        echo "</main></div>";
        joinContent('footer');
    break;
    default:
        joinContent('header');
        echo "<div class='wrapper'><main>";
        require_once("components/elements/output.php");
        echo "</main></div>";
        joinContent('footer');
    break;
}
