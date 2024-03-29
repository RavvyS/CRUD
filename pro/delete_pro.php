<?php
require_once("./db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Check if the ID is provided
    if (isset($_POST['id'])) {
        // Sanitize the ID to prevent SQL injection
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        
        // Prepare a delete statement
        $sql = "DELETE FROM pro WHERE userId = $id";
        
        if ($connection->query($sql) === TRUE) {
            echo "Record deleted successfully
            <br><br>
            <button><a href='./pro.php'>Back to read</a></button>
            ";
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    } else {
        echo "ID not provided.";
    }
} else {
    echo "Invalid request.";
}

$connection->close();
?>
