<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <title>Hello, world!</title>
</head>

<body>
    <!-- Navbar start -->
    <?php
    include('connection.php');

    if (isset($_POST['submit'])) {

        // If all fields are filled, proceed with inserting data into the database
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        // Hash the password
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15)); // 15 digit ka token auto generate

        $emailquery = "SELECT * from registration where email = '$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            echo "Email already exists";
        } else {
            if ($password === $cpassword) {

                $insertquery = "INSERT into registration (username, email, mobile, password, cpassword, token, status) values ('$username','$email','$mobile','$pass','$cpass','$token', 'inactive')";

                $iquery = mysqli_query($con, $insertquery);

                if ($iquery) {

                    $subject = "Email Activation";
                    $body = "Hi, $username . Click here to activate your account http://localhost/coach/phppraticeyt/Email-Activation-BY-Email/activate.php?token=$token";
                    $sender_email = "From: thephoenixsatyam@gmail.com";

                    // Attempt to send the email
                    if (mail($email, $subject, $body, $sender_email)) {
                        $_SESSION['msg'] = "Check your email to activate your account ($email)";
                        header('Location: registration.php');
                        exit(); // Ensure no further code execution after redirection
                    } else {
                        echo "Email sending failed. Please check your email settings.";
                    }
                } else {
?>
                    <script>
                        alert("Error adding user: <?php echo mysqli_error($con); ?>");
                    </script>
                <?php
                }
            } else {
                echo "Passwords do not match";
            }
        }
    }
    ?>


    <!-- Navbar end -->

    <!-- Contact Form -->
    <h1 class="text-center">Welcome to Register Page!</h1>
    <hr><br><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <form class="row g-3 bg-dark text-white" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">

                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control" name="username" id="validationDefault01"
                        placeholder="First Name" required>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>

                    <div class="col">
                        <label for="validationDefault01" class="form-label">Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="validationDefault01"
                            placeholder="First Name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Password
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="col">
                        Confirm Password
                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            Agree to terms and conditions
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="submit" value="Register Now!"></input>
                </div>
                <a href="login.php">Login</a>
                <hr>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <br><br>
    <!-- Footer Start -->
    <div class="row justify-content-evenly bg-dark text-white pt-2 pb-5">
        <div class="col-md-3 pt-2">
            <h5 class="pb-2">Company Detail</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta ea corrupti quas nihil quae, ducimus
                provident aliquam similique ipsa dolorem?</p>
        </div>

        <div class="col-md-3 pt-2">
            <h5>Important Link</h5>
            <p>
                <a href="index.php" class="link-light text-decoration-none">Home</a><br>
                <a href="about.php" class="link-light text-decoration-none">About</a><br>
                <a href="help.php" class="link-light text-decoration-none">Help</a><br>
                <a href="contact.php" class="link-light text-decoration-none">Contact</a><br>
                <a href="#" class="link-light text-decoration-none">Support</a><br>
            </p>
        </div>

        <div class="col-md-3 pt-2">
            <h5>Address</h5>
            <p>
                Raipur Malook <br>
                Post : Dhaka Karamchand<br>
                City : Dhampur(242667)<br>
                Mobile : +91123654789<br>
                State : Uttar Pradesh <br>
                District : Bijnor<br>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">© copyright 2024-2025 , Inc. or its Bootstrap</h5>
        </div>
    </div>
    <!-- Copyright End -->
</body>

</html>
