<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-4">
            
        </div>
        <div class="col-sm-4">
            <div class="login_form">
            <img src="logo.png" alt="Satyam chauhan" class="logo img-fluid">
            <?php
            include('config.php');
            if(isset($_GET['loginerror'])) {
              $loginerror=$_get['loginerror'];
            }
            if(!empty($loginerror)) {
              echo '<p class="errmsg">Invalid Login Credential, pLease Try Agin..</p>';
            }
            ?>
        <form action="login_process.php" method="post">
          <div class="form-group">
            <label class="label_txt">Username Or Email</label>
            <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo $loginerror; } ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div><br>
          <div class="form-group">
            <label class="label_txt" >Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
<br>
          <button type="submit" name="sublogin" class="btn btn-primary form_btn">Login</button>
        </form>
        <p style="font-size: 12px; text-align: center; margin-top: 10px;"><a href="forgot-password.php" style="color: #00376b;">Forgot Password</a></p>
        <br>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>