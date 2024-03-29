<?php
require_once("./db_connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if userId is provided
    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];
        // Retrieve form data
        $fullName = $_POST['fullName'];
        $contactNo = $_POST['contactNo'];
        $address = $_POST['address'];

        // Update data in the database
        $sql = "UPDATE pro SET fullName=?, contactNo=?, address=? WHERE userId=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $fullName, $contactNo, $address, $userId);
        
        if ($stmt->execute()) {
            echo "Record updated successfully
            <br><br>
            <button><a href='./pro.php'>Back to home</a></button>
            ";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } else {
        echo "User ID not provided";
    }
} else {
    echo "Invalid request";
}

$connection->close();
?>
