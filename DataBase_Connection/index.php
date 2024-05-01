<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud Operation</title>
  <?php include 'links.php' ?>
  <?php include 'nav.php' ?>
  <style>
    
  </style>
</head>
<body>

<form action="" method="post">
    <div class="container-fluid"  style="background-color: rgba(255, 102, 0, 0.827);">
    <center><h4>Welcome TO CRUD Function</h4>
    <p>Please fill all the details carefully. This form can change your life.</p>
    </center><br><br>
    <div class="row">
      
        <div class="col-md-2"></div>
        <div class="col-md-4">
        <input class="form-control" type="text" placeholder="enter your name" name="user" aria-label="default input example" required><br>
        <input class="form-control" type="tel" placeholder="mobile number" name="mobile" aria-label="default input example" required><br>
        <input class="form-control" type="text" placeholder="Any reference" name="refer" aria-label="default input example" required><br>
        <a href="display.php" class="btn btn-primary">Check Form</a>
        </div>
        <div class="col-md-4">
        <input class="form-control" type="text" placeholder="enter your qualification" name="degree" aria-label="default input example" required><br>
        <input class="form-control" type="email" placeholder="email id*" name="email" aria-label="default input example" required><br>
        <input class="form-control" type="text" value="Web Developer" placeholder="WebDeveloper Post" name="jobprofile" aria-label="default input example" required><br>
        <input type="submit" name="submit" class="btn btn-success float-right" value="Register"/>
        <br><br><br>
        </div>
        
    
    </div>
</div>
</form>
</body>
</html>

<?php

include 'connection.php';

if(isset($_POST['submit'])){

  $name = $_POST['user'];
  $degree = $_POST['degree'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $refer = $_POST['refer'];
  $jobprofile = $_POST['jobprofile'];

  $insertquerry = "insert into jobregistration(name,degree,mobile,email,refer,jobpost) values ('$name','$degree','$mobile','$email','$refer','$jobprofile')";

  $result = mysqli_query($con, $insertquerry);

  if($result){
    ?>
    <script>
      alert('Data Insert Successfully');
    </script>
    <?php
  }
  else{
    ?>
    <script>
      alert('Data Not Inserted:');
    </script>
    <?php
  }
}
?>