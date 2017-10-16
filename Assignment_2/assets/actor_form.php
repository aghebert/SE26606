<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 9:45 AM
 */
$currentDay = date('Y\-m\-d');

?>

<form method="GET" action="#">
    First Name: <input type="text" name="firstname" value="" align="right"/> <br />
    Last Name: <input type="text" name="lastname" value="" /> <br />
    Date of Birth: <input type="date" name="dob" value="" min=<?=$currentDay ?> /> <br />
    Height: <input type="text" name="height" value="" /> <br />
    <input type="submit" id="submitactors" name="submit" value="Add" />
</form>