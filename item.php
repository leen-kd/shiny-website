<?php
include './config.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>single-item</title>
        <link href="css/index.css" rel="stylesheet">
        <link href="css/nav.css" rel="stylesheet">
        <link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style> 
        .imgScale{ width: 100%;}
        </style>
    </head>
    <body>
        <div class="topnav1">
            <div class="search-container">
               <a href="search.php"><i class="fa fa-search"></i></a>
            </div>
            <?php
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
                               <li > <?php echo '<a href="normal.php?ID=3">'?>Dry Skin</a></li>
                               <li > <?php echo '<a href="normal.php?ID=2">'?>Oily Skin</a></li>
                               <li >  <?php echo '<a href="normal.php?ID=1">'?>Normal Skin</a></li>
                               <li>  <?php echo '<a href="normal.php?ID=4">'?>Combination Skin</a></li>
                               <li>  <?php echo '<a href="normal.php?ID=5">'?>Sensitive Skin</a></li>
                            </ul>


                        </li>
                        <li ><a href="index.php" accesskey="H">Home</a></li>
                    </ul>
                </nav>
            </header>
        </div>


        <div class="row3">
            <div class="container">
                <div class="item-container">
                    <?php
                    error_reporting(E_ALL);
                    if (isset($_GET['id'])) {
                        $itemNum = $_GET['id'];
                    }

                    $Info = "SELECT * FROM item WHERE id=" . $itemNum . "";
                    $resultInfo = mysqli_query($db, $Info);
                    $items = mysqli_fetch_row($resultInfo);
                    ?>
                    <!-- Left Column / item Image -->
                    <div class="left-column"> <?php
                    echo'<a href="wishlist.php?id='.$items[1].'"><img src="uploads/' . $items[6] . '" alt="item pic" class="imgScale"></a>';//height="500px" width="500px"
                    ?>
                    </div>
                    <!-- Right Column -->
                    <div class="right-column">

                        <!-- Product Description -->
                        <div class="product-description"> <?php
                        echo ' <span>' . $items[2] . '</span> <br/>
                              <h1>' . $items[3] . '</h1> <br/>
                              <p>' . $items[4] . '</p>';
                           ?>
                        </div>
                        <br/>
                        <hr>
                        <br/>
                        <!-- Product Pricing -->
                        <div class="product-price"> <?php echo' <span>' . $items[5] . '$</span> <br/>'; ?>
                           <?php if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
                               echo' <a href="wishList.php?id='.$items[0].'" class="cart-btn">Add to favorite</a>';
                               
                           }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row3">
            <div class="container">
                <div class="be-comment-block">
                    <h1 class="comments-title">Product Reviews</h1>

                <?php
                $Info2 = "SELECT * FROM review WHERE itemID=" . $itemNum . "";
                $resultInfo2 = mysqli_query($db, $Info2);
                while ($row2 = mysqli_fetch_row($resultInfo2)) {
                    echo ' <div class="be-comment">
                                <div class="be-img-comment">	
                                        <a href="blog-detail-2.html">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="be-ava-comment">
                                        </a>
                                </div>
                                <div class="be-comment-content">

                                                <span class="be-comment-name">
                                                        <h1 class="comments-title">' . $row2[3] . '</h1>
                                                        </span>
                                        <p class="be-comment-text">' . $row2[2] . '</p>
                                </div>
                            </div>';
                }
                ?>


                    <form class="form-block" action="" method="POST">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <input class="form-input" type="text" placeholder="Your name" name="name">
                                </div>
                            </div>
                            <br/>
                            <div class="col-xs-12">									
                                <div class="form-group">
                                    <textarea class="form-input" placeholder="Your comment" name="comment" rows="8" cols="200"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="cart-btn pull-right" name="addCom">
                        </div>
                    </form>
             <?php
                if (isset($_POST['addCom'])) {
                    $name_com = $_POST['name'];
                    $comment = $_POST['comment'];
                    if($name_com == ""){
                        echo '<script>alert("Please enter your name");</script>';
                    }elseif($comment == ""){
                         echo '<script>alert("Please enter your comment");</script>';
                    }else{
                    $sql3 = "INSERT INTO review(itemID, review, name) VALUES ('$itemNum','$comment','$name_com')";
                    if ($result3 = mysqli_query($db, $sql3)) {
                        $revID = mysqli_insert_id($db);
                        echo '<script>alert("Your comment has been submited successfully!");</script>';
                        //echo '<script>location.reload();</script>';
                    }
                }echo "<meta http-equiv='refresh' content='0'>";
                
                    }
                ?>


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