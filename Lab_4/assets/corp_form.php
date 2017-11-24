
<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 9:45 AM
 */
$currentDay = date('Y\-m\-d');

function addSort(){
$table=     "<form method=\"get\" action=\"../index.php\">";
$table.= "<label for=\"col\">Sort Column: </label>";
$table.= 	"<select name=\"col\" id=\"col\">";
$table.= 		"<option value=\"id\">id</option>";
$table.= 		"<option value=\"corp\">corp</option>";
$table.= 		"<option value=\"incorp_dt\">incorp_dt</option>";
$table.= 		"<option value=\"email\">email</option>";
$table.= 		"<option value=\"zipcode\">zipcode</option>";
$table.= 		"<option value=\"owner\">owner</option>";
$table.= 		"<option value=\"phone\">phone</option>";
$table.= 	"</select>";
$table.= "<label for=\"asc\">Ascending: </label>";
$table.= "<input type=\"radio\" name=\"dir\" value=\"ASC\" id=\"asc\">";
$table.= "<label for=\"desc\">Descending: </label>";
$table.= "<input type=\"radio\" name=\"dir\" value=\"DESC\" id=\"desc\">";
$table.= "<input type=\"hidden\" name=\"action\" value=\"sort\">";
$table.= "<input type=\"submit\">";
$table.= "<input type=\"submit\" name=\"action\" value=\"Reset\">";
$table.= "</form>";
    return $table;
}

function addButton(){
    $table = "<form  method=\"POST\" action=\"#\">" . PHP_EOL;
    $table .= "<br /> <br /><input type=\"submit\" name=\"action\" value=\"Add Company\"/> <br /><br />";
    $table .= "</form>" . PHP_EOL;
    return $table;
}

function addHTML()
{
    $table = "<form  method=\"POST\" action=\"#\">" . PHP_EOL;

    $table .= "<br />";
    $table .= "Corporation: <br /> <input type=\"text\" name=\"corp\" value=\"\"/> <br />";
    $table .= "Email: <br /> <input type=\"text\" name=\"email\" value=\"\"/> <br />";
    $table .= "Zipcode: <br /> <input type=\"text\" name=\"zipcode\" value=\"\"/> <br />";
    $table .= "Owner: <br /> <input type=\"text\" name=\"owner\" value=\"\"/> <br />";
    $table .= "Phone: <br /> <input type=\"text\" name=\"phone\" value=\"\"/> <br />";

    $table .= "<br /><input type=\"submit\" class='button' name=\"action\" value=\"Submit Company\" /> <br />";

    $table .= "<br />";


    $table .= "</form>" . PHP_EOL;


    return $table;

}

function updateHTML($db, $id)
{

    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $table = "<form  method=\"POST\" action=\"?id=$id\">" . PHP_EOL;

    $table .= "<br />";

    $table .= "Corporation: <br /> <input type=\"text\" name=\"corp\" value=\"" . $row['corp'] . "\"/> <br />";
    $table .= "Email: <br /> <input type=\"text\" name=\"email\" value=\"" . $row['email'] . "\"/> <br />";
    $table .= "Zipcode: <br /> <input type=\"text\" name=\"zipcode\" value=\"" . $row['zipcode'] . "\"/> <br />";
    $table .= "Owner: <br /> <input type=\"text\" name=\"owner\" value=\"" . $row['owner'] . "\"/> <br />";
    $table .= "Phone: <br /> <input type=\"text\" name=\"phone\" value=\"" . $row['phone'] . "\"/> <br />";

    $table .= "<br /><input type=\"submit\" class='button' name=\"action\" value=\"Update Corporation\" /> <br />";

    $table .= "<br />";

    $table .= "</form>" . PHP_EOL;


    return $table;
}

function goBackIndex()
{$table = "<br />";
    $table .= "<form  method=\"GET\" action=\"#\">" . PHP_EOL;
    $table .= "<br /><input type=\"submit\" class='button' name=\"action\" value=\"Go Back\" /> <br />";
    $table .= "</form>" . PHP_EOL;
    $table .= "<br />";
    return $table;
}
?>
