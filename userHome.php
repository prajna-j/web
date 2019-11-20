<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../include/header.php';
require_once '../db/db.class.php';

session_start();

$dbconn = new DB();

$userID = $_SESSION['userid'];

if ($userID <= 0) {
    header('location: login.php');
    die();
}

$where = "";

if (isset($_GET['filter'])) {

    $search = $_GET['search'];

    if (!empty($search)) {
        $where .= " WHERE (brandname LIKE '$search%' OR modelname LIKE '$search%' OR fueltype LIKE '$search%')";
    }
}

$str = "SELECT * FROM carinfo" . $where;
$result = $dbconn->executeSelect($str);
?>
<div class="container border mt-2">
    <div class="row my-2">
        <div class="col-md-12">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active btn btn-info" href="#" data-toggle="modal"
                       data-target="#addCarModal">Add Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">logout</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="#" class="form-inline my-4 my-lg-0" method="get">
                <input class="form-control mr-sm-2" style="width: 75%;"
                       type="search"  name="search" id="search"
                       placeholder="Search by car name, model or fuel type" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0"
                        name="filter" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">

        <?php
        if (count($result)) {
            foreach ($result as $row) {
                ?>
                <div class="col-md-4">
                    <div class="card my-4" style="width: 18rem;">
                        <img src="../uploads/<?php echo $row['image'] ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-text"><?php echo 'Model Name :' . $row['modelname'] ?></h5>
                            <p class="card-text"><?php echo 'Price :' . $row['price'] ?></p>
                            <p class="card-text align-content-center"><?php echo $row['description'] ?></p>
        <!--                            <p class="card-text"></p>-->
                            <!--                    <a href="#" class="btn btn-info form-control">Buy</a>-->
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-md-12">
                <div class="alert alert-warning text-center mt-2">
                    <p>No records!</p>
                </div>
            </div>
        <?php }
        ?>



    </div>

    <div class="modal fade" id="addCarModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add Car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCarForm" method="post"
                          action="../Action/registrationAction.php" enctype="multipart/form-data">

                        <input type="hidden" name="sessionID" id="sessionID" value="<?php echo $_SESSION['userid']; ?>"/>

                        <input type="hidden" name="command" value="addCar"/>
                        <div class="form-group">

                            <input type="text" class="form-control " id="brandname" name="brandname"
                                   placeholder="Brand Name">
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control " id="modelname" name="modelname"
                                   placeholder="Model Name">
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control " id="year" name="year"
                                   placeholder="Year">
                        </div>
                        <div class="form-group">

                            <select class="form-control " id="fueltype" name="fueltype">
                                <option value="-1">--Fuel Type--</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="LPG">LPG</option>

                            </select>
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control " id="runkm" name="runkm"
                                   placeholder="KM Driven">
                        </div>
                        <div class="form-group">

                            <textarea type="text" class="form-control " id="description" name="description"
                                      placeholder="Description" rows="3"></textarea>
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control " id="price" name="price"
                                   placeholder="Price">
                        </div>
                        <div class="custom-file form-group">
                            <input type="file" class="custom-file-input" id="carimage" name="carimage">
                            <label class="custom-file-label" for="carimag">Car Image</label>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" id="savecarButton"
                                    class="btn btn-primary form-control">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once '../include/footer.php';
?>
