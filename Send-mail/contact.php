<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>How to Send Mail in php </title>
  </head>
  <body>

  <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>How to send mail in php using PHP mailer</h4>
        </div>
        <div class="card-body">
            <form action="sendmail.php" method="post">

            <div class="mb-3">
                <label for="fullname">Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="subject">Subject</label>
                <input type="" name="subject" id="subject" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="message">Message</label>
                <textarea type="text" name="message" id="message" row="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Send Mail</button>
            </div>

            </form>
        </div>
    </div>
  </div>

    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
      var messageText = "<?=  $_SESSION['status'] ?? ''; ?>";
      if(messageText != ''){
      Swal.fire({
  title: "Thank You",
  text: messageText,
  icon: "success"
});
<?php unset($_SESSION['status']) ?>
      }
    </script>
   
  </body>
</html>