<?php
session_start();

include_once '../include/header.php';
include_once '../db/db.class.php';

$dbconn = new DB();

if (isset($_POST['confirmOrder'])) {

    $carId = $_POST['carId'];
    $sellerId = $_POST['sellerId'];
    $buyerId = $_POST['buyerId'];

    $insertOrder = "INSERT INTO orderinfo(carID, sellerID, buyerID, orderDate)"
            . " VALUES($carId, $sellerId, $buyerId, NOW())";
    $orderRid = $dbconn->executeInsertAndGetId($insertOrder);

    $_SESSION['carId'] = 0; // reset value

    header('location: userHome-Buyer.php?msg=confirmed');
    die();
}

$buyerId = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;

$carid = isset($_GET['id']) ? $_GET['id'] : (isset($_SESSION['carId']) ? $_SESSION['carId'] : 0);
$_SESSION['carId'] = $carid;

if ($buyerId <= 0) {
    header('location: buyerLogin.php');
    die();
}

if ($carid <= 0) {
    header('location: userHome-Buyer.php');
    die();
}

$str = 'SELECT * FROM userinfo WHERE userRid=' . $buyerId;
$result = $dbconn->executeSelect($str);

$selectCarOwner = "SELECT * FROM carinfo"
        . " JOIN userinfo ON (caruserID = userRid)"
        . " WHERE carID = $carid";
$carOwnerArray = $dbconn->executeSelect($selectCarOwner);

if (count($carOwnerArray) > 0) {
    $carOwner = $carOwnerArray[0];
}
?>

<div class="row projectTitle">
    <div class="col col-md-12">
        <div>Second-hand car sale</div>
    </div>
</div>

<?php
if (count($result)) {
    foreach ($result as $row) {
        ?>
        <div class="row mt-5 ml-5 mr-5">
            <div class="col col-1"></div>
            <div class="col col-10 border" id="confirmDiv">
                <form action="#" method="post">

                    <input type="hidden" name="carId" value="<?php echo $carOwner['carID']; ?>"/>
                    <input type="hidden" name="sellerId" value="<?php echo $carOwner['userRid']; ?>"/>
                    <input type="hidden" name="buyerId" value="<?php echo $row['userRid']; ?>"/>

                    <div class="col-4 border d-inline-block mt-2">
                        <h4><span class="badge badge-info form-control">Owner Information</span></h4>
                        <p class="form-control form-group" id="confirmownername">Owner Name : <?php echo $carOwner['user_name']; ?></p>
                        <p class="form-control form-group" id="confirmownercontact">Contact No  : <?php echo $carOwner['contactno']; ?></p>
                        <p class="form-control form-group" id="confirmowneremail">Email-ID  : <?php echo $carOwner['emailId']; ?></p>
                        <p class="form-control form-group" id="confirmowneraddress">Address  : <?php echo $carOwner['address']; ?></p>
                    </div>
                    <div class="col-3 border d-inline-block mt-2">
                        <h4><span class="badge badge-info form-control">Car Information</span></h4>
                        <img src="../uploads/<?php echo $carOwner['image']; ?>" class="card-img-top" alt="image" height="200px" width="200px">
                        <p class="form-control form-group">Price  : <?php echo $carOwner['price']; ?></p>

                    </div>
                    <div class="col-4 border d-inline-block mt-2">
                        <h4><span class="badge badge-info form-control">Buyer Information</span></h4>
                        <p class="form-control form-group" id="confirmbuyername">Name  : <?php echo $row['user_name']; ?></p>
                        <p class="form-control form-group" id="confirmbuyercontact">Contact No  : <?php echo $row['contactno']; ?></p>
                        <p class="form-control form-group" id="confirmbuyeremail">Email-ID  : <?php echo $row['emailId']; ?></p>
                        <p class="form-control form-group" id="confirmbuyeraddress">Address  : <?php echo $row['address']; ?></p>
                    </div>
                    <div class="mt-2 justify-content-center row">
                        <button type="submit" name="confirmOrder" class="btn btn-info ml-5">Confirm Order</button>
                    </div>
                </form>
            </div>
            <div class="col col-1"></div>
        </div>

        <?php
    }
}

include_once '../include/footer.php';
?>
<script src="../static/js/carandownerInfo.js" type="text/javascript"></script>



