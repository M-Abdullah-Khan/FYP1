<html>
    <head>
        <title>Unimainbech.com</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-1.12.3.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js" ></script>

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">   
    </head>
    <script>
        function set_categories(){
            if($(window).width() <= 990 && $(window).width() >= 600) {
                $("#EAP").css({
                    height: "100px",
                    width: "100px"
                });
                $("#CV").css({
                    height: "100px",
                    width: "100px"
                });
                $("#SH").css({
                    height: "100px",
                    width: "100px"
                });
                $("#Ser").css({
                    height: "100px",
                    width: "100px"
                });
                $("#Mob").css({
                    height: "100px",
                    width: "100px"
                });
                $("#CF").css({
                    height: "100px",
                    width: "100px"
                });
                $("#Job").css({
                    height: "100px",
                    width: "100px"
                });
                $("#LC").css({
                    height: "100px",
                    width: "100px"
                });
                $("#Bik").css({
                    height: "100px",
                    width: "100px"
                });
                $("#Boo").css({
                    height: "100px",
                    width: "100px"
                });
            }
            else if($(window).width() < 600) {
                $("#nav_category_images").empty();
                $("#nav_category_images").html('<a href="electronics_appliances.php"><div class="row"><div class="col-xs-12">Electronics and Appliances</div></div><div class="row"><div class="col-xs-12"><img src="other/appliances-150.jpg"></div></div></a><a href="cars_vehicles.php"><div class="row"><div class="col-xs-12">Cars and Vehicles</div></div><div class="row"><div class="col-xs-12"><img src="other/cars-150.jpg"></div></div></a><a href="cars_vehicles.php"><div class="row"><div class="col-xs-12">Sports and Hobbies</div></div><div class="row"><div class="col-xs-12"><img src="other/Sports-150.jpg"></div></div></a><a href="services.php"><div class="row"><div class="col-xs-12">Services</div></div><div class="row"><div class="col-xs-12"><img src="other/services-150.JPG"></div></div></a><a href="mobiles.php"><div class="row"><div class="col-xs-12">Mobiles</div></div><div class="row"><div class="col-xs-12"><img src="other/mobiles-150.jpg"></div></div></a><a href="fashion.php"><div class="row"><div class="col-xs-12">Clothing and Fashion</div></div><div class="row"><div class="col-xs-12"><img src="other/fashion-150.jpg"></div></div></a><a href="jobs.php"><div class="row"><div class="col-xs-12">Jobs</div></div><div class="row"><div class="col-xs-12"><img src="other/jobs-150.jpg"></div></div></a><a href="lap_computers.php"><div class="row"><div class="col-xs-12">Laptops and Computers</div></div><div class="row"><div class="col-xs-12"><img src="other/laptops-computers-150.jpg"></div></div></a><a href="bikes.php"><div class="row"><div class="col-xs-12">Bikes</div></div><div class="row"><div class="col-xs-12"><img src="other/bike-150.jpg"></div></div></a><a href="books.php"><div class="row"><div class="col-xs-12">Books</div></div><div class="row"><div class="col-xs-12"><img src="other/books-150.png"></div></div></a>');
            }
            else{
                $("#nav_category_images").empty();
                $("#nav_category_images").html('<div class="row"><div class="col-xs-2"><a href="electronics_appliances.php"><span style="align:center;">Electronics and Appliances<img src="other/appliances-150.jpg" id="EAP"></span></a></div><div class="col-xs-2"><a href="cars_vehicles.php"><span style="align:center;">Cars and Vehicles<img src="other/cars-150.jpg" id="CV"></span></a></div><div class="col-xs-2"><a href="sports_hobbies.php"><span style="align:center;">Sports and Hobbies<img src="other/Sports-150.jpg" id="SH"></span></a></div><div class="col-xs-2"><a href="services.php"><span style="align:center;">Services<img src="other/services-150.jpg" id="Ser"></span></a></div><div class="col-xs-2"><a href="mobiles.php"><span style="align:center;">Mobiles<img src="other/mobiles-150.jpg" id="Mob"></span></a></div></div><div class="row"><div class="col-xs-2"><a href="fashion.php"><span style="align:center;">Clothing and Fashion<img src="other/fashion-150.jpg" id="CF"></span></a></div><div class="col-xs-2"><a href="jobs.php"><span style="align:center;">Jobs<img src="other/jobs-150.jpg" id="Job"></span></a></div><div class="col-xs-2"><a href="lap_computers.php"><span style="align:center;">Laptops and Computers<img src="other/sub-categories/laptops-computers-150.jpg" id="LC"></span></a></div><div class="col-xs-2"><a href="bikes.php"><span style="align:center;">Bikes<img src="other/bike-150.jpg" id="Bik"></span></a></div><div class="col-xs-2"><a href="books.php"><span style="align:center;">Books<img src="other/books-150.png" id="Boo"></span></a></div></div>');
            }
        }
        
        
        $( window ).resize(function() {
            set_categories();
        });  
        $( window ).on( "orientationchange", function( event ) {
            set_categories();
        });
        $(document).ready(function(){
            set_categories();
        });
    </script>
    
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                  <a class="navbar-brand" href="index.php">UniMainBech</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li>
                              <div class="my-cat-menu">
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                                  <div class="cat"><a href="cars.php">Cars<img class="cat-image" src="other/cars-150.jpg" ></a></div>
                              </div>
                          </li><!--
                      --></ul>
                    </li>
                      <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Universities<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="nust.php">NUST</a></li>
                        <li><a href="fast.php">FAST</a></li>
                        <li><a href="lums.php">LUMS</a></li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-text-background"></span>Post Ad</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                  </ul>
                </div></br>
                <!-- Navbar Ends Here --><!--

                <!-- Ads Start Here -->
                <div class="container" id="ads"><!--
                <!-- Mockup Ad --><!--
                    --><div class="row"><!--
                        --><div class="col-xs-4"><img src="adimg/1.jpg" style="width:100px; height:100px;"></div><!--
                        --><div class="col-xs-4"><div class="row"></div><!--
                            --><div class="row"><!-- cat --><!--
                                --><div class="col-xs-12"><!--
                                    --><span style="font-size:150%; color:blue;">Sony Vaio 2016</span><!--
                                --></div><!--
                            --></div><!--
                            --><div class="row"><!-- Name --><!--
                                --><div class="col-xs-12"><!--
                                    --><span style="font-size:90%; color:#d7d7e5;"><a href="#">Electronics-->Laptops-->Sony Vaio</a></span><!--
                                --></div><!--
                            --></div><!--
                            --><div class="row"><!--
                                --><div class="col-xs-12"><!-- Description --><!--
                                    --><span style="font-size:110%;">NUST</span><!--
                                --></div><!--
                            --></div><div class="row"></div><!--
                            --><div class="row"><!--
                                --><div class="col-xs-12"><!-- Description --><!--
                                    --><span style="font-size:90%; color:#d7d7e5;">5:22am</span><!--
                                --></div><!--
                            --></div><div class="row"></div><!--
                        --></div><!--
                        --><div class="col-xs-4"><div class="row"></div><!--
                            --><div class="row"><!-- cat --><!--
                                --><div class="col-xs-12"><!--
                                    --><span style="font-size:100%; color:blue;">RS:45000</span><!--
                                --></div><!--
                            --></div><div class="row"></div><!--
                            --><div class="row"><!-- Name --><!--
                                --><div class="col-xs-12"><!--
                                    --><span><img src="adimg/1.jpg" style="width:100px; height:50px;"></span><!--
                                --></div><!--
                            --></div><!--
                        --></div><!--
                        --><div class="col-xs-2"></div><!--
                    --></div>
                <!-- /Mockup Ad -->
                </div>
                <!-- Ads End Here -->
            </div>
        </nav>
    </body>
</html>
