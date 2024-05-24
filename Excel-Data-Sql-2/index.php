<?php 
include('connection.php');
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require_once ('vendor/autoload.php');

if (isset($_POST['import'])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["exceldata"]["type"], $allowedFileType)) {

        $filename = $_FILES['exceldata']['name'];
        $tempname = $_FILES['exceldata']['tmp_name'];

        // Create 'uploads' directory if it doesn't exist
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        move_uploaded_file($tempname, 'uploads/' . $filename);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadSheet = $Reader->load('uploads/' . $filename);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i < $sheetCount; $i++) {
            $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            $email = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            $mobile = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            $message = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);

            $sql = "INSERT INTO enquiry (name, email, mobile, message) VALUES ('$name', '$email', '$mobile', '$message')";

            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        echo "Data imported successfully!";
    } else {
        echo "Please upload a valid Excel file.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Excel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-xl-6">
   
  <h2>Import Excel Data into mysql</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Upload Excel</label>
      <input type="file" class="form-control" name="exceldata">
    </div>
    
    
    <button type="submit" name="import" class="btn btn-default">Submit</button>

    <a href="samplefile.xlsx" class="float-right" download>Download Sample File</a>
  </form>
</div>
</div>
</div>

</body>
</html>
