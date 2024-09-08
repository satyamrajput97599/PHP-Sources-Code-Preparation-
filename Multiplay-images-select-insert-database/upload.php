<?php
require 'config.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $totalFiles = count($_FILES['fileImg']['name']);
    $filesArray = array();

    if ($totalFiles > 0) {
        for ($i = 0; $i < $totalFiles; $i++) {
            $imageName = $_FILES["fileImg"]["name"][$i];
            $tmpName = $_FILES["fileImg"]["tmp_name"][$i];
            $error = $_FILES["fileImg"]["error"][$i];
            
            if ($error !== UPLOAD_ERR_OK) {
                echo "<script>alert('Error uploading file: $imageName');</script>";
                continue;
            }

            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array($imageExtension, $allowedExtensions)) {
                echo "<script>alert('Invalid file type: $imageName');</script>";
                continue;
            }

            $newImageName = uniqid() . '.' . $imageExtension;

            if (move_uploaded_file($tmpName, 'uploads/' . $newImageName)) {
                $filesArray[] = $newImageName;
            } else {
                echo "<script>alert('Failed to move file: $imageName');</script>";
            }
        }

        $filesArrayJson = json_encode($filesArray);

        // Use backticks to enclose the table name if hyphens are used
        $stmt = $con->prepare("INSERT INTO `multiply-img` (name, image) VALUES (?, ?)");
        $stmt->bind_param('ss', $name, $filesArrayJson);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Successfully Added');
                    document.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>alert('Error: Could not insert data');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('No files selected');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" action="" method="post" >
        Name :
        <input type="text" name="name" required><br>
        Image :
        <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple><br>

        <button type="submit" name="submit" >Submit</button>
    </form>

    <a href="index.php">Index</a>
</body>
</html>