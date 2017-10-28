<br/>
<div class="center-align">
    <form method=\"POST\">
        <input type="submit" id="addcorps" name="addcorps" value="Add Company"/>
    </form>
</div>
<br/>
<br/>
<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 9:45 AM
 */
$currentDay = date('Y\-m\-d');

function addHTML()
{
    /*
        <form  method="POST" action="#">
        First Name: <br /> <input type="text" name="firstname" value=""/> <br />
        Last Name: <br/> <input type="text" name="lastname" value="" /> <br />
        Date of Birth: <br/> <input type="text" name="dob" value=""/> <br />
        Height: <br /> <input type="text" name="height" value="" /> <br />
        <input type="submit" id="submitactors" name="action" value="Add" />
    </form>
    */
}

function updateHTML($db, $id)
{

    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $table = "<form  method=\"POST\" action=\"#\">" . PHP_EOL;
    $table .= "Corporation: <br /> <input type=\"text\" name=\"corporation\" value=\"" . $row['corp'] . "\"/> <br />";
    $table .= "Email: <br /> <input type=\"text\" name=\"email\" value=\"" . $row['email'] . "\"/> <br />";
    $table .= "Zipcode: <br /> <input type=\"text\" name=\"zipcode\" value=\"" . $row['zipcode'] . "\"/> <br />";
    $table .= "Owner: <br /> <input type=\"text\" name=\"owner\" value=\"" . $row['owner'] . "\"/> <br />";
    $table .= "Phone: <br /> <input type=\"text\" name=\"phone\" value=\"" . $row['phone'] . "\"/> <br />";
    $table .= "<a href='?action=updatedata'>Update</a>";
    $table .= "</form>" . PHP_EOL;
    return $table;
}

?>
