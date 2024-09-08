<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image List</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Images</th>
        </tr>
        <?php
        $i = 1;

        // If your table name is `multiply_img`, use this:
        // $result = mysqli_query($con, "SELECT * FROM multiply_img");

        // If your table name is `multiply-img`, use backticks:
        $result = mysqli_query($con, "SELECT * FROM `multiply-img`");

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        // Fetch and display results
        while ($row = mysqli_fetch_assoc($result)) {
            $images = json_decode($row["image"]); // Correct field name here
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($row["name"]); ?></td>
                <td>
                    <?php
                    foreach ($images as $image) {
                        ?>
                        <img src="uploads/<?php echo htmlspecialchars($image); ?>" width="100" height="100">
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <a href="upload.php">Upload Image</a>
</body>
</html>
