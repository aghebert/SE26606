<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/15/17
 * Time: 8:40 PM
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
    <title>View All Actors</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1 class="navbar-default"><a href="phpadd.php">Add Actor  </a>
--
    <a href="phpview.php">  View all Actors</a></h1>

<br />


<?php
class actor {
    public $firstname;
    public $lastname;
    public $dob;
    public $height;
}

$sql = $db->prepare("SELECT * FROM actors");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_CLASS, "actor");
print "<pre>";
print_r($results);
print "</pre>";

?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
