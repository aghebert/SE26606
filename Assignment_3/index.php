<?php


require_once("assets/dbconn.php");
require_once("assets/corps.php");
require_once("assets/read_corp.php");
require_once("assets/corp_form.php");
include_once("assets/header.php");

$db = dbConn();


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";


switch ($action) {
    case "Add Company":
        echo addHTML();
        addCorporation($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone);
        break;
    case "Delete":
        break;
    case "Update":
        echo updateHTML($db, $id);
        break;
    case "Update Corporation":
        updateCorportation($db, $id, $corp, $email, $zipcode, $owner, $phone);
        break;
    case "Read":

        echo getCorporation($db, $id);

        break;
    case 'Go Back':
        header('Location: index.php');
        break;
    default:
        echo addButton();
        echo getCorporationsAsTable($db);
}


include_once("assets/footer.php");


?>