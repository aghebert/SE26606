<?php
require_once("assets/dbconn.php");
require_once("assets/actors.php");
include_once("assets/header.php");

$db = dbConn();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING) ?? "";
$lastname = filter_input(INPUT_POST, 'lasttname', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";

switch ($action) {
    case "Add":
        addDog($db, $firstname, $lastname, $dob, $height);

}

echo getActorsAsTable($db);
include_once ("assets/actor_form.php");
include_once("assets/footer.php");

?>