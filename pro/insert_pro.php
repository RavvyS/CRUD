<?php
require_once ("./db_connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // GET form data
        $fullName = $_POST['fullName'];
        $contactNo = $_POST['contactNo'];
        $address = $_POST['address'];

        // SQL Query
        $sql = "INSERT INTO pro (fullName, contactNo, address) VALUES ('$fullName', '$contactNo', '$address')";
        if (mysqli_query($connection, $sql)) {
            echo '<div>Message recieved succesfully!</div>';
        } else {
            echo "<div>Error: " . $sql . "<br>" . mysqli_error($link) . "</div>";
        }

        mysqli_close($connection);
    }
    ?>
    <br><br>
    <form action="insert_pro.php" method="post">

        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="fullName">
        <br><br>
        <input type="text" class="form-control" name="contactNo" id="contactNo" placeholder="contactNo">
        <br><br>
        <input type="text" class="form-control" name="address" id="address" placeholder="address">
        <br><br>
        <button type="submit">Submit</button>
    </form>
    <br><br>
    <div>
        <button><a href="./pro.php">Back to Read</a></button>
    </div>
</body>

</html>