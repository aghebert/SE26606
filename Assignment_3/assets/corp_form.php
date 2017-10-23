<br />
<div class="center-align">
    <form  method=\"POST\">
<input type="submit" id="addcorps" name="addcorps" value="Add Company" />
    </form>
</div>
    <br />
<br />
<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 9:45 AM
 */
$currentDay = date('Y\-m\-d');

function insertAdd()
{

    $table = "<form  method=\"POST\" action=\"#\">";
    $table .= "First Name: <br /> <input type='text' name='corp' value=''/> <br />";


    $table .= "<input type=\"submit\" id=\"submitcorps\" name=\"action\" value=\"Add\" />";

    return $table;
}

if(array_key_exists('addcorps',$_POST)){
    insertAdd();
}
?>
