<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Wish list</title>
        <link href="css/index.css" rel="stylesheet">
        <link href="css/nav.css" rel="stylesheet">
        <link href="css/skin.css" rel="stylesheet">
        <link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/wish.js"></script>
        <style>.img {
                min-width: 240px;
                margin-left: -130px;
            }
        </style>
    </head>
    <body onload="update()">
        <div class="topnav1">
            <div class="search-container">
                <a href="search.php"><i class="fa fa-search"></i></a>
            </div>
            <a href="signup.php">Sign-up</a>
            <a href="login.php">Log-in</a>


        </div>
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <img style="height: 100px; width: 170px; margin-top: 10px;" src='uploads/logo.png' alt='logo'> 
                </div>

                <nav id="mainav" class="fl_right">
                    <ul class="clear">

                        <li class="dropdown "><a>Skin Types</a>

                            <ul class="dropdown-content">
                                <li > <?php echo '<a href="normal.php?ID=3">' ?>Dry Skin</a></li>
                                <li > <?php echo '<a href="normal.php?ID=2">' ?>Oily Skin</a></li>
                                <li >  <?php echo '<a href="normal.php?ID=1">' ?>Normal Skin</a></li>
                                <li>  <?php echo '<a href="normal.php?ID=4">' ?>Combination Skin</a></li>
                                <li>  <?php echo '<a href="normal.php?ID=5">' ?>Sensitive Skin</a></li>
                            </ul>


                        </li>
                        <li ><a href="index.php" accesskey="H">Home</a></li>
                    </ul>
                </nav>
            </header>
        </div>


        <div class="row3">
            <div class="container">
                <h1 class="head">FAVORITE LIST</h1>
                <section >
                    <div class="container">
                        <div class="row">

                            <?php
                            if (isset($_GET["msg"])) {
                                $msg = $_GET["msg"];
                                $idSkin = $_GET["skinId"];
                                header('Location: normal.php?ID=' . $idSkin . '&&favmsg=' . $msg);
                            }
                            if(isset(($_GET["id"]))){
                            $itemId = $_GET["id"];
                            
                            $saved = "UPDATE `item` SET saved='1' WHERE id='$itemId'";
                            $savedresult = mysqli_query($db, $saved);

                            settype($itemId, "integer");
                            }
                            $sql = "SELECT * FROM item WHERE saved='1'";
                            $itemresult = mysqli_query($db, $sql);

                            if ($itemresult->num_rows > 0) {
                                while ($row = mysqli_fetch_array($itemresult)) {
                                    if ($itemresult->num_rows == 1) {
                                        echo "<div class='col-md-4 ' > <div class='food-item '>
		  <a href='item.php?id=" . $row['id'] . "' > <img style='max-size:100%;margin-right:115px; margin-left:-175px;' class='img-item img' src='uploads/" . $row['pic'] . "' alt='pic'></a>
		     <div class='text-content' style=' margin-right:90px; margin-left:-160px;'>
	            <div class='price' style='margin-right:60px; '>$" . $row['price'] . "</div>
		    <table class='option ' style='margin-left:-200px;margin-right:170px;'>
			<tr >
			<th class='image'><a href='delete.php?id=" . $row['id'] . "'><img src='uploads/delete.png' min-width='30px' height='20' alt='delete'></a></th>
			</tr>
                    </table>
			<br>
                      
                    <h4 style='text-align:center; '>" . $row['brand'] . ",<br> " . $row['name'] . "</h4>
                       </div>
                </div>
                </div>";
                                    } else {
                                        echo "<div class='col-md-4 '> <div class='food-item '>
		    <a href='item.php?id=" . $row['id'] . "' > <img style='max-size:100%;' class='img-item ' src='uploads/" . $row['pic'] . "' alt='pic'></a>

	            <div class='text-content'>
	            <div class='price'>$" . $row['price'] . "</div>
		    <table class='option ' style='margin-right:115px; margin-left:-115px;'>
			<tr >
			<th class='image'><a href='delete.php?id=" . $row['id'] . "'><img  src='uploads/delete.png' min-width='30px' height='20' alt='delete'></a></th>
			</tr>
                    </table>
			<br>
                      
                    <h4 style='text-align:center;'>" . $row['brand'] . ",<br> " . $row['name'] . "</h4>
                       </div>
                </div>
                </div>";
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>
                </section>

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
