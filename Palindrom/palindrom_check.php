<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Palindrome Checker in JavaScript | CodingNepal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h4>
        <?php
        if (isset($_POST['submit'])) {
            $word = $_POST['palin']; // Corrected 'POST' to uppercase

            $rev_word = strrev($word);
            if($word === $rev_word){
                echo "Yes, It is a Palindrome";
            }
            else{
                echo "No, It is not a Palindrome"; // Adjusted message for clarity
            }
        }
        ?>
    <div class="container">
    <h1>Palindrome Checker</h1>
        <div class="col-md-6"></div>
        <form action="" method="post">
        <div class="col-md-4">
          
          <textarea name="palin" class="form-control" id="" cols="10" rows="5"></textarea>
          <button class="btn btn-primary" name="submit" type="submit">Submit</button>
          
        </div>
        </form>
    </div>
</body>
</html>
