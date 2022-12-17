<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link href="css/index.css" rel="stylesheet">
	<link href="css/nav.css" rel="stylesheet">
        <link href="css/skin.css" rel="stylesheet">
	<link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #searchTxt {
                width : 500px;
            }
            .img {
		  min-width: 240px;
		   margin-left: -130px;
	}
        </style>
</head>
<body>
<div class="topnav1">

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
        <li class="active"><a href="index.php" accesskey="H">Home</a></li>
			</ul>
		</nav>
	</header>
</div>


<div>

 
<div class="row3">  

	<div class="container">
	 <div class="topnav1">
            <div class="search-container">
                <form action="" method="POST" name="searchBar">
                  <input type="text" placeholder="Search.." name="searchtext" id="searchTxt">
                  <button type="submit" name="srch"><i class="fa fa-search"></i></button>
                </form>
            </div>
         </div>
	<br>
            <section>
    	
            
                <?php 
                      if(isset($_POST['srch'])){
                        //  echo '<script>alert("hi")</script>';
                      $text = $_POST['searchtext'];
                     // echo $text;
                      //echo '<script>alert("'.$text.'")</script>';
                      $sql2="SELECT * FROM item WHERE name LIKE '%".$text."%' OR brand LIKE '%".$text."%'"; 
                      $result2 = mysqli_query($db, $sql2);
                      if($result2->num_rows == 0){
                              echo '<script>alert("There are no results for your search");</script>';
                          }else{
                      while ($Mrow = mysqli_fetch_array($result2)) {
                         
                          if($result2->num_rows == 1 ){?>
                <div class="col-md-4">
                	<div class="food-item">
                                                                                                       
                        <?php echo '<a href="item.php?id='.$Mrow['id'].'">'?><img style="max-size:100%;margin-right:115px; margin-left:-175px;" class='img-item img' src="<?php echo "uploads/$Mrow[6]"; ?>" alt="pic"></a>
                        <div class="text-content" style="margin-right:90px; margin-left:-160px;">
						<div class='price' style='margin-right:60px; '>$<?php echo $Mrow['price']; ?></div>
						<table class=" option" style="margin-left:-200px;margin-right:170px; ">
						<tr >
                                                 <?php if (isset($_SESSION["role"] ) && $_SESSION["role"] == "admin"){ ?>
						<th  class=" image"><?php echo '<a href="delete.php?iditem='.$Mrow['id'].'">' ?><img src="uploads/delete.png" min-width='30px' height='20' alt='delete' ></th>
						<th  class=" image"><?php echo '<a href="editItem.php?id='.$Mrow['id'].'">'?><img src="uploads/edit.png" width="20px" height="20" alt="edit"></a></th>
                                                <?php }else{ ?>
                                               
						<th  class=" image"><?php echo '<a href="wishlist.php?id='.$Mrow['id'].'">'?><img src="uploads/favorite.jpg" width="20px" height="20" alt="favorite" onclick="wish(); return false;"></a></th>
                                                <?php } ?>
						</tr>
                                                </table>
						<br>
                        	<h4 style="text-align:center;"><?php echo $Mrow['brand'].",<br> ".$Mrow['name'];?></h4> 
                        </div> 
                    </div>
                </div>
                <?php  }else{  ?>
                <div class="col-md-4">
                	<div class="food-item">
                        <?php echo '<a href="item.php?id='.$Mrow['id'].'"><img class="img-item" src="uploads//'.$Mrow[6].'" alt="'.$Mrow[6].'" ></a>';?>
                        <div class="text-content">
						<div class='price'>$<?php echo $Mrow['price']; ?></div>
						<table class=" option" style="margin-right:115px; ">
						<tr >
                                                <?php if (isset($_SESSION["role"] ) && $_SESSION["role"] == "admin"){ ?>
						<th  class=" image"><?php echo '<a href="delete.php?iditem='.$Mrow['id'].'">' ?><img src="uploads/delete.png" width="20px" height="20" alt="delete" ></th>
						<th  class=" image"><?php echo '<a href="editItem.php?id='.$Mrow['id'].'">'?><img src="uploads/edit.png" width="20px" height="20" alt="edit"></a></th>
                                                <?php }else{  
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
                
                      <?php }}} }?>
        
        
        
	</section>
            
            
	</div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
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