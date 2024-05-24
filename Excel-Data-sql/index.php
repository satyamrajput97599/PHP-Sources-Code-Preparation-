<?php

session_start();
$con = mysqli_connect("localhost","root","","phppraticeyt");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h4>".$_SESSION['message']."</h4>";
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>How to Import Excel Data Into database in PHP</h4>
                        </div>
                        <div class="card-body">

                        <form action="code.php" method="post" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button name="save_excel_data" type="submit" class="btn btn-primary mt-3">Import</button>
                        </form> 

                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>