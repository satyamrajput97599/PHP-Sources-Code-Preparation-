<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Database</title>
    <?php include 'links.php' ?>
    <?php include 'nav.php' ?>
</head>

<body>
    <div class="main-div">
        <h1>DataBase Page</h1>
        <hr />
        <div class="center-div">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Degree</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>refer</th>
                            <th>post</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'connection.php';
                        
                        $selectquery = "Select * from jobregistration";
                        
                        $query = mysqli_query($con, $selectquery);

                        // $num = mysqli_num_rows($query);
                        // echo $num;
                        // $res = mysqli_fetch_array($query);
                        // print_r($res[2]);
                        while($res = mysqli_fetch_array($query)){
                        //    echo "<pre>";
                        //    print_r ($res);
                        ?>
                       
                        <tr>
                            <td>
                                <?php echo $res['id']; ?>
                            </td>
                            <td>
                                <?php echo $res['name'] ?>
                            </td>
                            <td>
                                <?php echo $res['degree'] ?>
                            </td>
                            <td>
                                <?php echo $res['mobile'] ?>
                            </td>
                            <td>
                                <?php echo $res['email'] ?>
                            </td>
                            <td>
                                <?php echo $res['refer'] ?>
                            </td>
                            <td>
                                <?php echo $res['jobpost'] ?>
                            </td>
                            <td>
                                <a href="update.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="top" title="UPDATE"><i class="fa-solid fa-pen-to-square"></i></a>
                                &nbsp; &nbsp; 
                                <a href="delete.php?id=<?php echo $res['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>