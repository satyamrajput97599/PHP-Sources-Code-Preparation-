<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Signup Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div><br>
            <div class="col-md-4 mt-2">
                <img src="logo.png" alt="Satyam chauhan" class="logo img-fluid">
            </div>
            <div class="col-sm-4">
            </div>
        </div>

        <div class="row">
            <?php
            if(isset($_POST['signup']))
            {
                extract($_POST);
                if(strlen($fname) < 3);
                {
                    $error[] = ' Please enter first name using 3 character atleast';
                }

                if(strlen($fname)>20) { // max
                    $error[] = " First Name: Max Length 20 Characters not Allowed ";
                }
                if(!preg_match("/^[A-Za-z_]*[A-Za-z]+[A-za-z_]*$/", $fname)){
                    $error[] = " Invalid Enter First Name .Please Enter Letters without and Digit or special symbols like (1,2,3#,$,%,&,*,!,~,`,^,-,)";
                }

                if(strlen($lname) < 3); // Minimum
                {
                    $error[] = ' Please enter last name using 3 character atleast';
                }
                
                if(strlen($lname)>20) { // max
                    $error[] = " Last Name: Max Length 20 Characters not Allowed ";
                }
                if(!preg_match("/^[A-Za-z_]*[A-Za-z]+[A-za-z_]*$/", $lname)){
                    $error[] = " Invalid Enter Last Name .Please Enter Letters without and Digit or special symbols like (1,2,3#,$,%,&,*,!,~,`,^,-,)";
                }

                if(strlen($username) < 3); // Change Minimum Length
                {
                    $error[] = ' Please enter username name using 3 character atleast';
                }
                if(strlen($username)>50) { // Change Max Length
                    $error[] = " Username : Max Length 20 Characters not Allowed ";
                }
                if(!preg_match("/^^[^0-9][A-Za-z0-9]+([_ -]?[a-z0-9])*$/", $username)){
                    $error[] = " Invalid Enter User Name .Please Enter lowercase letters without any space and No number at the start- Eg - myusername,okuniqueuser or myusername123";
                }
                if(strlen($email)>50){
                    $error[]='Email length should be less than 50 characters.';
                }
                if($passwordConfirm == ''){
                    $error[]= 'Please confirm your password!';
                }
                if($password != $passwordConfirm){
                    $error[]= 'Passwords do not match!';
                }
                if(strlen($password)<5){ // min
                    $error[]= 'Password must contain minimum of 6 characters long!';
                }
                if(strlen($password) > 20){ // Max
                    $error[]= 'Password Max length  20 characters Not allowed!';
                }

                $sql = "SELECT * from crud_user where (username='$username' or email='$email')";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res) > 0){
                    $row = mysqli_fetch_assoc($res);

                    if($username == $row['username'])
                    {
                        $error[] = 'Username already Exists.';
                    }
                    if($email==$row['email'])
                    {
                        $error[] = 'Email already Exists';
                    }
                }
                if(!isset($error)){
                    $date = date('Y-m-d');
                    $options = array("cost"=>4);
                    
                    $password = password_hash($password,PASSWORD_BCRYPT,$options);

                    $result = mysqli_query($con, "INSERT into crud_user values ('','$fname','$lname','$username','$email','$password','$data')");
                    if($result)
                    {
                        $done=2;
                    }
                    else {
                        $error[] = 'Failed : Something went wrong';
                    }
                }

            }
            ?>
            <div class="col-md-4">
                <?php
                if (isset($error))
                {
                    foreach($error as $error){
                        echo '<p class="errmsg">&#x26A0; '. $error .'</p> ';
                    }
                }
                ?>
            </div>
            <div class="col-md-4">
                <?php
                if(isset($done))
                {
                    ?>
                    <div class="successmsg"><span style="font-size:100px;">&#9989</span><br> You Have Register Successfully . <br> <a href="login.php" style="color: #fff;">Login here...</a></div>
                    <?php }else { ?>
           
            <br>
            <div class="signup_form">
                <form action="" method="post">
                    <div class="form-group">
                        <label class="label_txt">First Name</label>
                        <input type="text" class="form-control" name="fname" value="<?php if(isset($error)) { echo $fname;} ?>" required="">
                    </div><br>
                    <div class="form-group">
                        <label class="label_txt">Last Name</label>
                        <input type="text" class="form-control" name="lname" value="<?php if(isset($error)) { echo $lname;} ?>" required="">
                    </div><br>
                    <div class="form-group">
                        <label class="label_txt">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php if(isset($error)) { echo $username;} ?>" required="">
                    </div><br>
                    <div class="form-group">
                        <label class="label_txt">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php if(isset($email)) { echo $email;} ?>" required="">
                    </div><br>
                    <div class="form-group">
                        <label class="label_txt">Password</label>
                        <input type="password" class="form-control" name="password"  required="">
                    </div><br>
                    <div class="form-group">
                        <label class="label_txt">Confirm Password</label>
                        <input type="password" class="form-control" name="passwordConfirm" required="">
                    </div><br>
                    <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
                    <p>Have an account? <a href="login.php">Log in</a></p>
                    <?php } ?>
                </form>
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
