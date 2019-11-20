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

$mes = "";
$where = "WHERE 1 = 1 ";

if (isset($_GET['msg'])) {
    $mes = $_GET['msg'];
} else if (isset($_GET['filter'])) {

    $search = $_GET['search'];

    if (!empty($search)) {
        $where .= " AND (brandname LIKE '$search%' OR modelname LIKE '$search%' OR fueltype LIKE '$search%')";
    }
}

$str = "SELECT * FROM userinfo"
        . " JOIN carinfo ON userRid = caruserID "
        . $where;

$result = $dbconn->executeSelect($str);
?>

<?php if (!empty($mes)) { ?>
    <script>
        alert('Your order has been confirmed!');
    </script>
<?php } ?>

<div class="container border mt-2">
    <div class="row my-2">
        <div class="col-md-12 my-2">
            <ul class="nav justify-content-end">
                <li class="nav-item">
<!--                    <select name="catagory" id="catagory" class="dropdown mr-3">
                        <option value="-1">--Select Catagory--</option>
                        <option value="">Hyundai</option>
                        <option value="">Maruthi</option>

                    </select>
                    <select name="fueltype" id="fueltype" class="mr-3">
                        <option value="-1">--Select Fuel Type--</option>
                        <option value="">Petrol</option>
                        <option value="">Desiel</option>
                        <option value="">LPG</option>
                    </select>-->
                    <a class="btn btn-info" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline my-4 my-lg-0" action="#" method="get">
                <input class="form-control mr-sm-2" style="width: 75%;"
                       type="search" name="search" id="search"
                       placeholder="Search by car name, model or fuel type" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" name="filter"
                        type="submit">Search</button>
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
                        <img src="../uploads/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-text"><?php echo 'Model Name :' . $row['modelname'] ?></h5>
                            <p class="card-text"><?php echo 'Price :' . $row['price'] ?></p>
                            <p class="card-text align-content-center"><?php echo $row['description'] ?></p>
                            <a class="btn btn-info form-control" id="buycar"
                               onclick="showBuyModel('<?php echo $row['user_name'] ?>',
                                               '<?php echo $row['contactno'] ?>',
                                               '<?php echo $row['address'] ?>',
                                               '<?php echo $row['price'] ?>',
                                               '<?php echo $row['image'] ?>',
                                               '<?php echo $row['carID'] ?>')">Buy</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-md-12 mt-2">
                <div class="alert alert-warning text-center">
                    <p>No match found!</p>
                </div>
            </div>
        <?php }
        ?>



    </div>

    <div class="modal fade modal-xl modal-lg" id="buycarModel" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Buy Car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../User/buyerOrderConfirmation.php" method="get" id="modalorderform">
                        <input type="hidden" id="carid" name="carid"/>
                        <input type="hidden" id="id" name="id"/>    <!-- car id -->
                        <input type="hidden" name="command" value="carorder"/>

                        <div class="row">
                            <div class="col-6 border">
                                <div class="card">
                                    <img class="card-img-top" src="..." alt="Card image cap" id="buymodalimage">
                                    <div class="card-body">
    <!--                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 border">
                                <div class="form-group my-2">
                                    <input type="text" class="form-control" id="ownername" name="ownername" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="ownercontactno" name="ownercontactno" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="owneraddress" name="owneraddress" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="carprice" name="carprice" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-info form-control">
                                    Buy
                                </button>
                            </div>
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
<script src="../static/js/carandownerInfo.js" type="text/javascript"></script>
