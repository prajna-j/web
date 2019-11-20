<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../include/header.php';
require_once './session.php';
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
                <form method="Post" action="../Action/registrationAction.php" id="userloginform">
                    <input type="hidden" name="command" value="userLogin">

                    <div class="form-group">
                        <lable class="badge-info form-control h3 text-center">Login</lable>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="username" name="username" placeholder="Username" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="password" id="password" name="password" placeholder="Password" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <button id="loginUser" name="loginUser" class="form-control btn-info">Sign In</button>
                    </div>
                    <div class="form-group">
                        <a href="../User/registration.php" class="align-content-center">New User..?</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <?php
    require_once '../include/footer.php';
    ?>
