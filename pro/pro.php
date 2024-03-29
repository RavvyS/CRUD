<?php
require_once("./db_connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>

<body>
    <?php

    // Fetch data from DB
    $sql = "SELECT userId, fullName, contactNo, address FROM pro";
    $result = $connection->query($sql);

    // Validating if data remains in the database
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userId = $row["userId"];
            $fullName = $row['fullName'];
            $contactNo = $row['contactNo'];
            $address = $row['address'];
            ?>
            <div class="card-body">
                <ul>
                    <li><?php echo $fullName; ?></li>
                    <li><?php echo $contactNo; ?></li>
                    <li><?php echo $address; ?></li>
                    <li>
                        <!-- Link/button to redirect to edit_pro.php with userId parameter -->
                        <button><a href="readSpecific_pro.php?id=<?php echo $userId; ?>">Update</a></button>
                    </li>

                    <li>
                        <form method="post" action="delete_pro.php">
                            <input type="hidden" name="id" value="<?php echo $userId; ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
            <br><br>
            <?php
        }
    } else {
        // validation
        echo '<div>No feedback data available.</div>';
    }

    $connection->close();
    ?>

    <br><br><br>
    <button><a href="insert_pro.php">Insert Data</a></button>
</body>

</html>
