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
        <div class="row">
            <div class="col-md-12">
                <div class="col-mt-3">
                    <div class="card-header">
                        <h4>How to filter Or find or Search date using Multiply CheckBox in php</h4>
                    </div>
                </div>
            </div>

            <!-- Brand List -->
            <div class="col-md-3">
                <form action="" method="post">
                <div class="card shadow mt-3">
                    <div class="card-header">
                        <h5>Filter
                            <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <h6>Brand List</h6>
                        <hr>

                        <?php
                        include ('../DataBase_Connection/connection.php');
                        $brand_query = "SELECT * from checkbox_data";
                        $brand_query_run = mysqli_query($con, $brand_query);

                        if(mysqli_num_rows($brand_query_run) > 0)
                        {
                            while($brandlist = mysqli_fetch_assoc($brand_query_run))
                            {
                                $checked = [];
                                if(isset($_POST['brands']))
                                {
                                    $checked = $_POST['brands'];
                                }
                                ?>
                                <div>
                                    <input type="checkbox" name="brands[]" value="<?php echo $brandlist['id']; ?>"
                                        <?php if(in_array($brandlist['id'], $checked)) {echo "checked";}; ?>
                                    />
                    
                                    <?php echo $brandlist['name']; ?>
                                </div>
                                <?php
                            }
                        }else {
                            echo "NO Data Brands Found";
                        }
                        ?>
                    </div>
                </div>
                </form>
            </div>

            <!-- Brand Items Product -->
            <div class="col-md-9 mt-2">
                <div class="card mt-3">
                    <div class="card-body row">
                    <?php

                    if(isset($_POST['brands']))
                    {
                        $brandchecked = [];
                        $branchecked = $_POST['brands'];
                        foreach($branchecked as $rowbrand)
                        {
                            // echo $rowbrand;
                            $products = "SELECT * FROM products where brand_id IN ($rowbrand)";
                            $products_run = mysqli_query($con, $products);

                            if(mysqli_num_rows($products_run) > 0) {
                                while($proditems = mysqli_fetch_assoc($products_run)) {
                    ?>
                                    <div class="col-md-4">
                                        <div class="border p-2">
                                            <h6><?php echo $proditems['name']; ?></h6>
                                        </div>
                                    </div>
                    <?php
                                }
                            } else {
                                echo "No Item Found";
                            }
                        }
                    }
                    else {
                        $products = "SELECT * FROM products";
                        $products_run = mysqli_query($con, $products);

                        if(mysqli_num_rows($products_run) > 0) {
                            while($proditems = mysqli_fetch_assoc($products_run)) {
                    ?>
                                <div class="col-md-4">
                                    <div class="border p-2">
                                        <h6><?php echo $proditems['name']; ?></h6>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "No Item Found";
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
