<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Check_Box Data Retrieve</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>How Delete Multiply Data or record using Checkbox in PHP MYSQL</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h4>". $_SESSION[ 'status' ] ."</h4>";
                    unset($_SESSION[ 'status' ]);
                }
                ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="code.php" method="post">
                            <table class="table table-border table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            <button type="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                        </th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Phone No</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <?php
                                      include ('../DataBase_Connection/connection.php');

                                      $query = "SELECT * from student";
                                      $query_run = mysqli_query($con, $query);

                                      if(mysqli_num_rows($query_run) > 0)
                                      {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td style="width:10px; text-align: center;">
                                                    <input type="checkbox" name="stud_delete_id[]" value="<?php echo $row['id'] ?>" />
                                                </td>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['stud_name'] ?></td>
                                                <td><?php echo $row['stud_class'] ?></td>
                                                <td><?php echo $row['stud_phone'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                      }
                                      else 
                                      {
                                        ?>
                                        <tr>
                                            <td colspan="5">NO Record Found</td>
                                        </tr>
                                        <?php
                                      }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
