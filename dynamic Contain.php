<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Contain</title>
</head>
<body>
    <form action="" method="post">
        Enter Your Fav Color : 
        <input type="text" name="favcolor">

        <input type="submit" name="submit" value="Check Now">

        <p>
        <?php

            if(isset($_POST['submit'])){
                $favcolor = $_POST['favcolor'];

                // echo  "Your favorite color is: ". $favcolor . "<br>";
                
               switch($favcolor){
                case "blue": echo "Your Fav Color  Is Blue!";
                break;

                case "yellow": echo  "Your Fav Color Is Yellow!";
                break;

                case "red": echo "Your Fav Color Is Red!";
                break;

                default: echo "Your Chooses Color Not Found";
               }
            }
         ?>
        </p>
    </form>
</body>
</html>