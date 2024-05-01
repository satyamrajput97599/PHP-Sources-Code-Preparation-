<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
          
body {
  background:#33d9b2;
  font-size: 12px;
}

body, button, input {
  font-family: 'Righteous', cursive;
  font-weight: 700;
  letter-spacing: 1.4px;
}

.background {
  display: flex;
  min-height: 100vh;
}

.container {
  flex: 0 1 700px;
  margin: auto;
  padding: 10px;
}

.screen {
  position: relative;
  background: #3e3e3e;
  border-radius: 15px;
}

.screen:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
  z-index: -1;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 1;
  padding: 50px;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

}

.app-title {
  display: flex;
  /*flex-direction: column;*/
  justify-content: center;
  align-items: center;
  color: #33d9b2;
  font-size: 26px;
  text-transform: uppercase;
  border-left: 4px solid #218c74;
  padding: 10px;
}

.app-form-group {
  margin-bottom: 15px;
}

.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

.app-form-control {
  width: 100%;
  padding: 10px 0;
  background: none;
  border: none;
  border-bottom: 1px solid #666;
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color .2s;
}

.app-form-control::placeholder {
  color: #FFF;
}

.app-form-control:focus {
  border-bottom-color: #ddd;
}

.app-form-button {
  background: #33d9b2;
  border: none;
  color: #fff;
  font-size: 14px;
  cursor: pointer;
  outline: none;
  padding: 10px 12px;
  border-radius: 5px;
  text-transform: uppercase;
}

.app-form-button:hover {
  color: #218c74;
}

.showdata{
  text-align: center;
  color: white;
  font-size: 1.2rem;
  padding-top: -10px;
  padding-bottom: 10px;
}   
.app-form-control{
    text-align: center;
}
    </style>
</head>
<body>
    <div class="background">
        <div class="container">
          <div class="screen">
            <div class="screen-body">
              <div class="screen-body-item left">
                <div class="app-title animate__animated animate__infinite animate__pulse">
                    PHP <br> Calculator <br>
                </div>
              </div>
              <div class="screen-body-item">
                <div class="app-form">
                  <form action="" method="post">
                  <div class="app-form-group">
                    <input type="text" class="app-form-control" name="num1" placeholder="Enter Number">
                  </div>
                  <div class="app-form-group">
                    <input  type="text"  class="app-form-control" name="num2"  placeholder="Enter Number">
                  </div>
                   <div class="select-style">
                    <select class="app-form-control" name="operation">
                        <option value="add">Add</option>
                        <option value="sub">Sub</option>
                        <option value="mul">Mul</option>
                        <option value="div">Div</option>
                    </select>
                   </div>
                  <div><br> 
                    <input type="submit" name="submit" value="submit" class="app-form-button" id="button">
                  </div> 
                </form>           
                </div>
            </div>
      
          </div>
            <div class="app-form-group showdata">
                    <p> 
                      <?php

                          if(isset($_POST['submit'])){
                            $num1 = $_POST['num1'];
                            $num2 = $_POST['num2'];
                            // echo $num1 . $num2;
                            $operation = $_POST['operation'];

                            switch($operation){
                              case "add": $sum = $num1 + $num2;
                              echo "The Addition of two number is $sum";
                              break;

                              case "sub": $sub = $num1 - $num2;
                              echo "The Subtraction of two number is $sub";
                              break;

                              case "mul": $mul = $num1 * $num2;
                              echo "The Subtraction of two number is $mul";
                              break;

                              case "div": $div = $num1 / $num2;
                              echo "The Subtraction of two number is $div";
                              break;

                              default;
                               echo "Invalid Operation! Please select add, sub, mul or div.";
                            }
                          }
                      ?>
                    </p>
           </div>
        </div>
      </div>
      
      </body>
      </html>
</body>
</html>
