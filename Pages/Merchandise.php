<!--This page is the one that has the products that the fans can purchase from-->
<?php
//require the functions that will be used in the page here
    require_once ('../php/functions.php');

    
    session_start();
    if(strpos($_SESSION["email"],'.admin')){
        header("location:../index.html");
      }
//if no login done before by the fan no access is made and the user is directed to the login page
if(!isset($_SESSION["username"])){
    header("location:../index.html");
}
//setting a cookie that is the cart to use it in the js pages to update the cart when the fan purchase a certain item
setcookie("cart",0,time()+10000000000);

//when the purchase is successfully done then the system will redirect to the merchandise page and if the redirection is done correctly
//alert with success purchase is given
if (isset($_GET['redirected']) && $_GET['redirected'] == 'true') {
    echo '<script>alert("Purchase done successfully!");</script>';
}
//if there is no enough money or points with the user to purchase the system will redirect the fan to the merchandise page
//and alert with is given with no available money
if (isset($_GET['wrong']) && $_GET['wrong'] == 'true') {
    echo '<script>alert("You do not have enough money or points in your system!");</script>';
}
?>



<!DOCTYPE html>
<html lang="en">
<style>
        
    nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    font-size: 1.2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.2s ease-in-out;
    padding: 20px;
    position: relative;
    }

    nav ul li a::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #fff;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease-in-out;
    }

    nav ul li a:hover::before {
    transform: scaleX(1);
    }


</style>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../images/fav/Web logo.jpeg" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/merchandise.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="../css/header.css" />

    </head>
    <body>
        

            
<header style="padding:0px;position:fixed;top:0px; width:100%; z-index:1;">
    <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
    <div class="container position-relative" style="margin:0px;">
        <ul class="menu-list js-clone-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="About_Merchandise.php">About</a></li> 
        <li><a href="Tickets.php">Tickets</a></li>
        <li style="float: right;"><a href="../Pages/user_profile.php"><img style="width:30px;" src="../images/settings.png" alt="icon"></a></li>
        </ul>
        <div style="position:absolute; left:45%;">
            <div class="btn btn-outline-dark "  style="color:white;margin-right:12px;">
                <i class="bi-cart-fill me-1"></i>
                <span id="txt">Cart</span>
                <span class="badge bg-dark text-white ms-1 rounded-pill" id="add_cart">0</span>
            </div>
            <div  class="btn btn-outline-dark " style="color:white;">
                <i class="bi bi-piggy-bank-fill me-1"></i>
                <span id="txt">Points</span>
                <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo displayPoints($_SESSION["username"]);?></span>
            </div>
        </div>


        <div class="right">
            <span style="color:white;">Welcome <?php echo $_SESSION["username"];?></span> <button type="button" name="logout" onclick="Logout()">Log out</button>
        </div>
    </div>

    </nav>
</header>
        
        
        <!-- Header-->
        <header class="bg-dark py-5" style="margin-top:56px ;background-color:black;border-top:27px solid white; !important">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder" id="Title">The Footy Fanatic Emporium</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Look like a pro, play like a pro with our football club shop apparel</p>
                </div>
            </div>
        </header>
        <!--declare for an offer as ads-->
        <div class="ads">
            <div class="new">OFFER</div>
            <div class="news-ticker" style="background-color:black;">
            
                <ul>
                    <li>Buy items with total price=500!!! AND GET 200 POINTS FREE</li>
            
                </ul>
            </div>
        </div>

        

        <!-- Section-->
        <section class="py-5" >
            <div class="container px-4 px-lg-5 mt-5" >
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" >
                    <div class="col mb-5" >
                        <div class="card h-100">
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Shoes 2024">0</div>

                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Shoes 2024"); ?>" alt="Shoes 2024" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Shoes 2024</h5>
                                    <!-- Product price-->
                                    
                                    <?php 
                                        echo displayPrice("Shoes 2024");
                                    ?>

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button  id="addtocart" name="cart" class="btn btn-outline-dark mt-auto shake" onclick="addtoCart(<?php echo GetPrice('Shoes 2024');?>,'Shoes 2024',<?php echo GetQuantity('Shoes 2024');?>)">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Shoes 2024');?>,'Shoes 2024')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Champions Ball 2024">0</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Champions Ball 2024"); ?>" alt="Champions Ball 2024" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Champions Ball 2024</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2" style="margin-left:80px;">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div><br>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through" style="left:90px;position:absolute;">
                                        $20.00
                                    </span>
                                    <span style="left:145px;position:absolute;">
                                    <?php 
                                        echo displayPrice("Champions Ball 2024");
                                    ?>
                                    </span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button id="addtocart"  name="cart" id="addtocart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('Champions Ball 2024');?>,'Champions Ball 2024',<?php echo GetQuantity('Champions Ball 2024');?>)">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Champions Ball 2024');?>,'Champions Ball 2024')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="T-Shirt">0</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("T-Shirt"); ?>" alt="Player's T-Shirt" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">T-Shirt</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    <?php 
                                        echo displayPrice("T-Shirt");
                                        ?> 

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button  id="addtocart" name="cart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('T-Shirt');?>,'T-Shirt')">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('T-Shirt');?>,'T-Shirt')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Goal Keeper Gloves">0</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Goal Keeper Gloves"); ?>" alt="Goal Keeper Gloves" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Goal Keeper Gloves</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2"  style="margin-left:80px;">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div><br>
                                    <!-- Product price-->
                                    <span style="left:110px;position:absolute;">
                                        <?php 
                                        echo displayPrice("Goal Keeper Gloves");
                                        ?>
                                    </span>
                                    
 
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button id="addtocart"  name="cart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('Goal Keeper Gloves');?>,'Goal Keeper Gloves')">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Goal Keeper Gloves');?>,'Goal Keeper Gloves')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Training Bibs">0</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Training Bibs"); ?>" alt="Training Bibs" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Training Bibs</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    <?php 
                                        echo displayPrice("Training Bibs");
                                        ?> 

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button id="addtocart"  name="cart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('Training Bibs');?>,'Training Bibs',<?php echo GetQuantity('Training Bibs');?>)">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Training Bibs');?>,'Training Bibs')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Training Vest">0</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Training Vest"); ?>" alt="Training Vest" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Training Vest</h5>
                                    <!-- Product price-->
                                    <?php 
                                        echo displayPrice("Training Vest");
                                        ?> 

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button id="addtocart" name="cart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('Training Vest');?>,'Training Vest')">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Training Vest');?>,'Training Vest')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Skeleton Mannequin">0</div>

                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Skeleton Mannequin"); ?>" alt="Skeleton Mannequin" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Skeleton Mannequin</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2"  style="margin-left:80px;">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div><br>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"  style="left:90px;position:absolute;">$20.00</span>
                                    <span style="left:145px;position:absolute;">
                                    <?php 
                                        echo displayPrice("Skeleton Mannequin");
                                        ?> 
                                    </span>
                                

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button  id="addtocart" name="cart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('Skeleton Mannequin');?>,'Skeleton Mannequin')">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Skeleton Mannequin');?>,'Skeleton Mannequin')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!--count products-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem" id="Scarf">0</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="../images/Merchandise_images/<?php echo displayImage("Scarf"); ?>" alt="Scarf" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Scarf</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2" style="margin-left:80px;">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div><br>
                                    <!-- Product price-->
                                    <span style="left:110px;position:absolute;">
                                    <?php 
                                        echo displayPrice("Scarf");
                                        ?> 
                                    </span>
                                 

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button id="addtocart" name="cart" class="btn btn-outline-dark mt-auto" onclick="addtoCart(<?php echo GetPrice('Scarf');?>,'Scarf',<?php echo GetQuantity('Scarf');?>)">Add to cart</button></div>
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" id="remove-from-cart" onclick="removefromCart(<?php echo GetPrice('Scarf');?>,'Scarf')">Remove from cart</button></div>                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="purchase">
                    <form action="purchase_form.php" method="post" id="purchase-form">
                        <label id="label" style="pointer-events: none;" disabled>Confirm your Purchase here:</label>
                        <button type="button" id="purchase" class="Purchase-button" onclick="checkForPurchase()" style="pointer-events: none;" disabled>Purchase</button>
                        <input type="hidden" id="hidden" name="hidden" value="">

                        <input type="hidden" id="hidden1" name="hidden1" value="">
                        <input type="hidden" id="hidden2" name="hidden2" value="">
                        <input type="hidden" id="hidden3" name="hidden3" value="">
                        <input type="hidden" id="hidden4" name="hidden4" value="">
                        <input type="hidden" id="hidden5" name="hidden5" value="">
                        <input type="hidden" id="hidden6" name="hidden6" value="">
                        <input type="hidden" id="hidden7" name="hidden7" value="">
                        <input type="hidden" id="hidden8" name="hidden8" value="">

                    </form>
                </div>
            
            </div>
        </section>
        
       
        <!-- Footer for copy rights-->
        <footer class="py-5 bg-dark" style="background-color:black;color:white">
            <div class="container"><p class="m-0 text-center text-white">&copy; 2024 Football Merchandise. All rights reserved.</p></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--link to js pages for functions-->
        <script src="../js/scripts.js"></script>
        <script src="../js/purchase.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            //animations done by adding some classes and these classes contain some styling
            $(document).ready(function() {
            // Add animation to product cards on hover
            $('.card').hover(
                function() {
                $(this).addClass('animate__animated animate__pulse');
                },
                function() {
                $(this).removeClass('animate__animated animate__pulse');
                }
            );
            });
            // function to logout
            function Logout(){
                window.location.href = "../php/signout.php";
            }
            
        </script>
        <script>
            function _(element) {
                return document.getElementById(element);
            }
            
        </script>
        

    </body>
</html>