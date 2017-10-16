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

<form method="GET" action="#">
    <input type="text" name="firstname" value="" /><br />
    <input type="text" name="lastname" value="" /><br />
    <input type="text" name="dob" value="" /><br />
    <input type="text" name="height" value="" /><br />
    <input type="submit" id="submitactors" name="submit" value="Do it" />
</form>

<?php
$sql = $db->prepare("SELECT * FROM actors");
$sql->execute();
$results = $sql->fetchAll();
if (count($results)){
    foreach ($results as $actor){
        print_r($actor);
    }
}
print "<table> n";
$results = $db->query($sql);
//return only the first row (we only need field names)
$row = $results->fetch(PDO::FETCH_ASSOC);
print " <tr> n";
foreach ($row as $field => $value){
    print " <th>$field</th> n";
} // end foreach
print " </tr> n";
//second query gets the data
$data = $con->query($query);
$data->setFetchMode(PDO::FETCH_ASSOC);
foreach($data as $row){
    print " <tr> n";
    foreach ($row as $name=>$value){
        print " <td>$value</td> n";
    } // end field loop
    print " </tr> n";
} // end record loop
print "</table> n";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
} // end try
 ?>