<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1{
            text-align: center;
            line-height: 20vh;
            color: #6c63ff;
        }
        .main-div{
            width: 100%;
            height: 80vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .left-side{
            background-color: #dfe6e9;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        .left-side img{
            max-width: 400px;
            height: auto;
        }
        .right-side{
            width: 400px;
            height: 300px;
            background-color: #dfe6ed;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .input1{
            width: 250px;
            height: 40px;
            padding: 5px;
            outline: none;
            border-radius: 1px solid grey;
            border-radius: 5px;
        }
        .selection {
            width: 100%;
            margin: 20px 0;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 5px;
            outline: none;
            border: none;
            background-color: #6c63ff;
            color : white;  
            font-size: 0.9rem
        }
        p{
            margin: 20px 0 0 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Temperature Conversion</h1>
        <div class="main-div">
            <div class="left-side">
                <img src="img/img.jpg" alt="">
            </div>
            <div class="right-side">
            <form action="" method="post">
                    <input type="text" name="num" placeholder="Enter Number" class="input1">
                    <div class="selection">
                        <label for="">Celsius</label>
                        <input type="radio" name="units" value="cel">

                        <label for="">Fahrenheit</label> <!-- corrected spelling -->
                        <input type="radio" name="units" value="feh">
                    </div>

                    <input type="submit" name="submit" value="Convert Now" class="btn">
                </form>
                <div>
                    <p>
                        <?php

                        if(isset($_POST['submit'])){
                            $num = $_POST['num'];
                            $temp = $_POST['units'];

                            if($temp == "cel"){
                                $result = $num * 9 / 5 +  32;
                                echo "The Conversion Value of Cel in faren is " .$result;
                            }
                            else{
                                $result = ($num - 32) * 5 / 9;
                                echo "The Conversion Value of faren in Cel is " .$result;
                            }
                        }
                        else{
                            echo "Please Enter a Number and select a temperature Units";
                        }

                        ?>
                    </p>
                </div>
            </div>
        </div>
    </header>

</body>
</html>