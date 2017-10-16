<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/13/17
 * Time: 7:38 PM
 */
$dsn = "mysql:host=localhost;dbname=PHPClassFall2017";
$username = "root";

try{
    $db = new PDO($dsn, $username);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $submit = $_GET['submit'] ?? "";
    if ($submit == "Do it"){
        $id = $_GET['id'] ?? "";
        $firstname = $_GET['firstname'] ?? "";
        $lastname = $_GET['lastname'] ?? "";
        $dob = $_GET['dob'] ?? "";
        $height = $_GET['height'] ?? "";

        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);

        $sql->execute();

        echo $sql->rowCount() . " rows inserted";

    }
} catch (PDOException $e) {
    die("There was a problem connecting to the DB.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<h1><a href="phpadd.php">Add Actor  </a>



<a href="phpview.php">  View all Actors</a></h1>

<br />


<form method="GET" action="#">
    First Name: <input type="text" name="firstname" value="" align="right"/><br />
    Last Name: <input type="text" name="lastname" value="" /> <br />
    Date of Birth: <input type="text" name="dob" value="" /><br />
    Height: <input type="text" name="height" value="" /><br />
    <input type="submit" id="submitactors" name="submit" value="Do it" />
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>

