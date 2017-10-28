<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 8:55 AM
 */

function getCorporationsAsTable($db)
{
    try {
        $sql = $db->prepare("SELECT * FROM corps");
        $sql->execute();

        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if ($sql->rowCount() > 0) {
            $table = "<table class='table'>" . PHP_EOL;

            foreach ($corps as $corpor) {
                $table .= "<tr><td>";
                $table .= $corpor['corp'];
                //$table .= "</td><td><form action='#' method='post'><input type='hidden' name='id' value='" . $corpor['id'] . "' /><input type='submit' name='action' value='Read' /> </form>";
                $table .= "</td><td><a href='?action=Read&id=" . $corpor['id'] . "'>Read</a>";
                $table .= "</td><td><a href='?action=Update&id=" . $corpor['id'] . "'>Update</a>";
                $table .= "</td><td><a href='?action=Read&id=" . $corpor['id'] . "'>Delete</a>";
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else {
            $table = "There are no corporations in the DB" . PHP_EOL;
        }
        return $table;


    } catch (PDOException $e) {
        die("There was a problem getting the list");
    }
}

function addCorporation($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone)
{
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, :incorp_dt, :email, :zipcode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);

        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem adding this corporation");
    }
}

function getCorporation($db, $id)
{
    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $table = "<table class='table'>" . PHP_EOL;
    $table .= "<tr><th>";
    $table .= "Corporation";
    $table .= "</th><th>";
    $table .= "Incorporation Date";
    $table .= "</th><th>";
    $table .= "Email";
    $table .= "</th><th>";
    $table .= "Zipcode";
    $table .= "</th><th>";
    $table .= "Owner";
    $table .= "</th><th>";
    $table .= "Phone Number";
    $table .= "</th></tr>";

    $table .= "<tr><td>";
    $table .= $row['corp'];
    $table .= "</td><td>";
    $table .= $row['incorp_dt'];
    $table .= "</td><td>";
    $table .= $row['email'];
    $table .= "</td><td>";
    $table .= $row['zipcode'];
    $table .= "</td><td>";
    $table .= $row['owner'];
    $table .= "</td><td>";
    $table .= $row['phone'];
    $table .= "</td></tr>";
    $table .= "</table>" . PHP_EOL;
    return $table;
}

function updateCorportation($db, $id, $corp, $email, $zipcode, $owner, $phone){
    try {
        $sql = $db->prepare("UPDATE corps VALUES (null, :corp, :incorp_dt, :email, :zipcode, :owner, :phone) WHERE id=" . $id);
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);

        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e) {
        die("There was a problem updating this corporation");
    }

}

?>