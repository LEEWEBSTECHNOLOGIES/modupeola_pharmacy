<?php
include "action.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="images/drug.png">

    <title>Modupeola Pharmacy</title>
  </head>
  <body>
    <div class="container">
        <div class="jumbotron"> 
            <h1>Medicine Stock <small>Modupeola Pharmacy</small></h1>           
        </div>        
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Enter Medicine Details</div>
                    <div class="card-body">
                        <?php
                            if (isset($_GET["update"])) {
                                //PHP 7
                                $id = $_GET["id"] ?? null;
                                $where = array("id"=>$id,);
                                $row = $obj->select_record("medicines", $where);
                        ?>
                        <form method="post" action="action.php">
                            <table class="table table-hover">
                                <tr>
                                    <td><input type="hidden" class="form-control" name="id" value="<?php echo $id;  ?>"></td>
                                </tr>
                                <tr>
                                    <td>Medicine Name</td>
                                    <td><input type="text" class="form-control" value="<?php echo $row["m_name"];  ?>" name="name" placeholder="Enter Medicine Name"></td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td><input type="text" class="form-control" value="<?php echo $row["qty"];  ?>" name="qty" placeholder="Enter Quantity"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>
                                </tr>                                
                            </table>                            
                        </form>          

                        <?php
                    }else {
                        ?>            
                        
                        <?php
                    }

                    ?>
                        <form method="post" action="action.php">
                            <table class="table table-hover">
                                <tr>
                                    <td>Medicine Name</td>
                                    <td><input type="text" class="form-control" name="name" placeholder="Enter Medicine Name"></td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td><input type="text" class="form-control" name="qty" placeholder="Enter Quantity"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Store"></td>
                                </tr>                                
                            </table>                            
                        </form>                        
                    </div>                    
                </div>
            </div>
            <div class="col-md-3"></div>            
        </div>        
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Medicine Name</th>
                        <th>Available Stock</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                        $myrow = $obj->fetch_record("medicines");
                        foreach ($myrow as $row) {
                            //Breaking Point
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["m_name"]; ?></td>
                                <td><b><?php echo $row["qty"]; ?></b></td>
                                <td><a href="index.php?update=1&id=<?php echo $row["id"];  ?>" class="btn btn-info">Edit</a></td>
                                <td><a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>

                            <?php
                        }
                    ?>
                    
                    
                </table>
            </div>
            <div class="col-md-2"></div>
            
        </div>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="jquery/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>