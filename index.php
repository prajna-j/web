<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <a class="navbar-brand" href="#">Second-hand car sale</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse align-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="User/login.php">Login <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="User/registration.php">New User...?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="User/userHome-Buyer.php">Buy Car</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="User/login.php">Sell Car</a>
                    </li>


                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!--slideshow-->

        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="static/images/login.jpeg" class="d-block w-100" alt="...">
                        <!--<div class="carousel-caption d-none d-md-block">
                            <h5>Project title</h5>
                            <p>Student 1  Student 2.  Student 3</p>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img src="static/images/second.jpeg" class="d-block w-100" alt="...">
                        <!--<div class="carousel-caption d-none d-md-block">
                            <h5>Project title</h5>
                            <p>Student 1  Student 2.  Student 3</p>
                        </div>-->
                    </div>
                    <div class="carousel-item">
                        <img src="static/images/registration.jpeg" class="d-block w-100" alt="...">
                       <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>Project title</h5>
                            <p>Student 1  Student 2.  Student 3</p>
                        </div>-->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <script src="./static/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="./static/js/popper.min.js" type="text/javascript"></script>
        <script src="./static/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
