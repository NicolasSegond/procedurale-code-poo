<?php

require_once("Model/database.php");


$action = $_GET['action'];

if(!isset($_GET['action'])) {
    $action = "home";
}

switch ($action){
    case "home":
        require_once("Controller/Articles.php");
        break;
    case "inscription":
    case "connexion":
        require_once("Controller/Utilisateurs.php");
        break;
}



