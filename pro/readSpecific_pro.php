<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <?php
    require_once("./db_connection.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check if userId is provided in the URL
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Fetch data from DB based on userId
        $sql = "SELECT fullName, contactNo, address FROM pro WHERE userId = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $fullName = $row['fullName'];
            $contactNo = $row['contactNo'];
            $address = $row['address'];
        } else {
            echo "User not found";
            exit(); // or handle accordingly
        }
    } else {
        echo "User ID not provided";
        exit(); // or handle accordingly
    }

    $connection->close();
    ?>

    <h1>Edit User</h1>
    <form action="update_pro.php" method="post">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>"> <!-- Adding userId field -->
        <label for="fullName">Full Name:</label><br>
        <input type="text" id="fullName" name="fullName" value="<?php echo $fullName; ?>"><br>
        <label for="contactNo">Contact Number:</label><br>
        <input type="text" id="contactNo" name="contactNo" value="<?php echo $contactNo; ?>"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
