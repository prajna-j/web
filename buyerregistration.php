<?php
require_once '../include/header.php';
?>

<body style="background-image: url('../static/images/registration.jpeg'); background-repeat: no-repeat;background-size: 100%;">
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
            <div class="col col-md-4">Instructions</div>


            <div class="col col-md-4 logindiv">


            </div>


            <div class="col col-md-4 mt-2 card" style="background-color: #fff0;">
                <form id="userRegistrationForm" method="Post" action="../Action/registrationAction.php">
                    <input type="hidden" name="command" value="userRegistration">
                    <div class="form-group">
                        <lable class="badge-info form-control h3 text-center">New User Registration</lable>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="name" name="name" placeholder="Name" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="contactno" name="contactno" placeholder="Contact No" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="email" name="email" placeholder="Email-Id" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <textarea class=form-control rows="5" id="address" name="address" placeholder="Address" autocomplete="off"></textarea>
                    </div>

                    <div class="form-group">
                        <input class=form-control type="text" id="username" name="username" placeholder="Username" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input class=form-control type="text" id="password" name="password" placeholder="Password" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <button id="savebuyer" name="savebuyer" class="form-control btn-info">Register</button>
                    </div>





                </form></div>
        </div>


    </div>

    <?php
    require_once '../include/footer.php';
    ?>
