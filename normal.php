<?php
include 'config.php';
session_start();
?>


<!DOCTYPE html>
<html>
    
       <?php 
        if(isset($_GET["msg"])){
		    $msg=$_GET["msg"];
		   echo "<script> alert('$msg');</script>";
		   echo '<a href="normal.php?ID='.$_GET["idSkin"].'">';
		    }
	 if(isset($_GET["favmsg"])){
		    $msg=$_GET["favmsg"];
		   echo "<script> alert('$msg');</script>";
		    }
       if(isset($_GET['ID'])){
            $skin= $_GET['ID'];
           // echo "<script> alert('$skin');</script>";
            $sql= "SELECT type FROM skin WHERE id='$skin'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_row($result);
           // echo "<script> alert('$row[0]');</script>";
        }  
       ?>
<head>
	<title><?php echo $row[0]; ?> Skin</title>
	<link href="css/index.css" rel="stylesheet">
	<link href="css/nav.css" rel="stylesheet">
	<link href="css/skin.css" rel="stylesheet">
	<link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="wish.js" ></script>
	<style>.img {
		  min-width: 240px;
		   margin-left: -130px;
	}
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
				
				<li class="dropdown active"><a>Skin Types</a>

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
            	<h1 class="head"><?php echo $row[0]; ?> SKIN </h1>
	<section >
    	<div class="container">
            <div class="row">
                <?php 
		      $sql1="SELECT * FROM item WHERE idSkin='$skin'"; 
                      $result1 = mysqli_query($db, $sql1);
                      while ($Mrow = mysqli_fetch_array($result1)) {
			  if ($result1->num_rows == 1) {?>
                <div class="col-md-4">
                	<div class="food-item">
                        <?php echo '<a href="item.php?id='.$Mrow['id'].'"><img style="max-size:100%;margin-right:115px; margin-left:-175px;" class="img-item img" src="uploads//'.$Mrow[6].'" alt="'.$Mrow[6].'" ></a>';?>
                        <div class="text-content" style=' margin-right:90px; margin-left:-160px;'>
						<div class='price' style='margin-right:60px; '>$<?php echo $Mrow['price']; ?></div>
						<table class=" option"  style='margin-left:-200px;margin-right:170px;'>
						<tr >
                                                <?php if (isset($_SESSION["role"])&& $_SESSION["role"] == "admin"){ ?>
						<th  class=" image"><?php echo '<a href="delete.php?ID='.$_GET['ID'].'&&iditem='.$Mrow['id'].'">' ?><img src="uploads/delete.png" width="20px" height="20" alt="delete" ></th>
						<th  class=" image"><?php echo '<a href="editItem.php?id='.$Mrow['id'].'">'?><img src="uploads/edit.png" width="20px" height="20" alt="edit"></a></th>
                                                <?php } ?>
                                                <?php if (isset($_SESSION["role"])&& $_SESSION["role"] != "admin"){ 
						    		$msg="Item Added Successfully!"; ?>
						<th  class=" image"><?php echo '<a href="wishlist.php?id='.$Mrow['id'].'&&msg='.$msg.'&&skinId='.$Mrow['idSkin'].' ">';?><img src="uploads/favorite.jpg" width="20px" height="20" alt="favorite" onclick="wish(); return false;"></a></th>
                                                <?php } ?>
						</tr>
                                                </table>
						<br>
                        	<h4 style="text-align:center;"><?php echo $Mrow['brand'].",<br> ".$Mrow['name'];?></h4> 
                        </div> 
                    </div>
                </div>
                      <?php }else{ ?>
		    <div class="col-md-4">
                	<div class="food-item">
                        <?php echo '<a href="item.php?id='.$Mrow['id'].'"><img class="img-item" src="uploads//'.$Mrow[6].'" alt="'.$Mrow[6].'" ></a>';?>
                        <div class="text-content">
						<div class='price'>$<?php echo $Mrow['price']; ?></div>
						<table class=" option" style="margin-right:115px; ">
						<tr >
                                                <?php if (isset($_SESSION["role"])&& $_SESSION["role"] == "admin"){ ?>
						<th  class=" image"><?php echo '<a href="delete.php?ID='.$_GET['ID'].'&&iditem='.$Mrow['id'].'">' ?><img src="uploads/delete.png" width="20px" height="20" alt="delete" ></th>
						<th  class=" image"><?php echo '<a href="editItem.php?id='.$Mrow['id'].'">'?><img src="uploads/edit.png" width="20px" height="20" alt="edit"></a></th>
                                                <?php } ?>
                                                <?php if (!isset($_SESSION["role"])|| $_SESSION["role"] != "admin"){ 
						    		$msg="Item Added Successfully!"; ?>
						<th  class=" image"><?php echo '<a href="wishlist.php?id='.$Mrow['id'].'&&msg='.$msg.'&&skinId='.$Mrow['idSkin'].' ">';?><img src="uploads/favorite.jpg" width="20px" height="20" alt="favorite" onclick="wish(); return false;"></a></th>
                                                <?php } ?>
						</tr>
                                                </table>
						<br>
                        	<h4 style="text-align:center;"><?php echo $Mrow['brand'].",<br> ".$Mrow['name'];?></h4> 
                        </div> 
                    </div>
                </div>
		      <?php }}?>

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