<!DOCTYPE html>
<?php
session_start();

require_once '../db/db.class.php';
require_once '../include/header.php';

$dbconn = new DB();

$error = "";

if (isset($_POST['buyerlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $str = "SELECT * FROM userinfo WHERE username='$username'";
    $result = $dbconn->executeSelect($str);
    if (count($result) != 0) {
        if ($result[0]["pwd"] == $password) {
            $_SESSION['userid'] = $result[0]["userRid"];

            if (isset($_SESSION['carId']) && $_SESSION['carId'] > 0) {
                header('location: buyerOrderConfirmation.php');
                die();
            } else {
                header('location: userHome-Buyer.php');
                die();
            }
        } else {
            $error = "Invalid credentials";
        }
    } else {
        $error = "Invalid credentials";
    }
}
?>
<body style="background-image: url('../static/images/login.jpeg'); background-repeat: no-repeat;background-size: 100%;">
    <div class="container maindiv">
        <div class="row">
            <div class="col col-md-12">
                <p></p>

            </div>

        </div>
        <div class="row projectTitle">
            <div class="col col-md-12">
                <div>Second-hand car sale</div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-8">Instructions</div>

            <div class="col col-md-4 logindiv">
                <form method="post" action="#" id="userloginform">
                    <input type="hidden" name="command" value="userLogin">

                    <div class="form-group">
                        <lable class="badge-info form-control h3 text-center">Login</lable>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="username" name="username" placeholder="Username" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="password" name="password" placeholder="Password" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="buyerlogin" class="form-control btn-info">Sign In</button>
                    </div>
                    <?php if (!empty($error)) { ?>
                        <div class="form-group">
                            <div class="alert alert-danger text-center">
                                <p><?php echo $error; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <a href="../User/buyerregistration.php" class="align-content-center">New User..?</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <?php
    require_once '../include/footer.php';
    ?>
