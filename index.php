<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="css/index.css" rel="stylesheet">
        <link href="css/nav.css" rel="stylesheet">
        <link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        <div class="topnav1">
            <div class="search-container">
               <!-- <input type="text" placeholder="Search.." name="search"> -->
                <a href="search.php"><i class="fa fa-search"></i></a>

            </div>
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo "<script> alert('$msg');</script>";
            }
            if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                echo "<a href='logout.php'>Log-out</a>";
            } else {
                echo "<a href='signup.php'>Sign-up</a>
            <a href='login.php'>Log-in</a>";
            }
            ?>




        </div>
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <img style="height: 100px; width: 170px; margin-top: 10px;" src='uploads/logo.png' alt='logo'> 
                </div>

                <nav id="mainav" class="fl_right">
                    <ul class="clear">

                        <li class="dropdown"><a>Skin Types</a>

                            <ul class="dropdown-content">
                                <li > <?php echo '<a href="normal.php?ID=3">' ?>Dry Skin</a></li>
                                <li > <?php echo '<a href="normal.php?ID=2">' ?>Oily Skin</a></li>
                                <li >  <?php echo '<a href="normal.php?ID=1">' ?>Normal Skin</a></li>
                                <li>  <?php echo '<a href="normal.php?ID=4">' ?>Combination Skin</a></li>
                                <li>  <?php echo '<a href="normal.php?ID=5">' ?>Sensitive Skin</a></li>
                            </ul>



                        </li>
                        <li class="active"><a href="index.php" accesskey="H">Home</a></li>
                    </ul>
                </nav>
            </header>
        </div>


        <div>
            <div class="row3">  
                <?php
                if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                    echo "<a href='addItem.php'><img style='height:30px; margin-top:30px;  margin-left:50px;' src='uploads/add.png' alt='add'></a>";
                } else {
                    echo "<a href='wishList.php'><img style='height:40px; margin-top:30px;  margin-left:50px;' src='uploads/bookmark.png' alt='favorite'></a>";
                }
                ?>
                <div class="container">



                    <div class="items">
                        <p class="log link">
                            <?php echo '<a href="normal.php?ID=3">' ?> Dry Skin</a> 
                        </p>
                        <br>
                        <p class="log link">
                            <?php echo '<a href="normal.php?ID=2">' ?> Oily Skin</a> 
                        </p>
                    </div>

                    <div class="items">
                        <p class="log link">
                            <?php echo '<a href="normal.php?ID=1">' ?> Normal Skin</a>
                        </p>
                        <br>
                        <p class="log link">
                            <?php echo '<a href="normal.php?ID=4">' ?> Combination Skin</a> 
                        </p>

                    </div>

                    <div class="items">
                        <br>
                        <p class="log link">
                            <?php echo '<a href="normal.php?ID=5">' ?> Sensitive Skin</a> 
                        </p>

                    </div>
                </div>
            </div>
            <div id="m" class="wrapper row5">
                <div id="copyright" class="hoc clear">
                    <footer>
                        <p class="copyright">Copyright &copy; 2022 shiny, inc.</p>
                    </footer>
                </div>
            </div>
    </body>
</html>

