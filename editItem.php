<?php
include 'config.php';
session_start();
if ($_SESSION["role"] != "admin" || !isset($_SESSION['id'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link href="css/index.css" rel="stylesheet">
	<link href="css/nav.css" rel="stylesheet">
	<link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/editValid.js"></script>
     <style>.form1{
                width: 600px;
                margin: auto;
            }
        </style>
</head>
<body>
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
    
           <?php
                    $id = $_GET["id"];
		    
		    if(isset($_GET["msg"])){
		    $msg=$_GET["msg"];
		    $id=$_GET["itemId"];
		   echo "<script> alert('$msg');</script>";
		    }
                  $sql = "SELECT * FROM item WHERE id='$id'";
                    $result = mysqli_query($db, $sql);

                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);

                        echo '
	        <div>
			<br>
                <form name="Edit" class="form1"  action="edit.php" method="POST" enctype="multipart/form-data">
	        <fieldset>
	
		<legend>EDIT PRODUCT INFO</legend>
		    <input type="hidden" name="id" value="' . $id . '" />
		    <input type="hidden" name="skinId" value="' . $row['idSkin'] . '" />

		<p> Product Brand:</p> 
		<input type="text" name="brand" value="'.$row['brand'].'" placeholder="new Brand name"> 
		<p> Product Name:</p> 
		<input type="text" name="name"  value="'.$row['name'].'" placeholder="new Name"> 
		<p> Product Description:</p> 
		<input type="text" name="description"  value="'.$row['description'].'" placeholder="new Description">
		<p> Product Price:</p> 
		<input type="text" name="price"  value="'.$row['price'].'" placeholder="new Price">
		<p> Product Picture:</p> 
	       <input type="file" name="image" id="img"  value="' . $row['pic'] . '"  >
	       </label> <br>
		 <input type="submit" value="save" class="submit" name="item_Id" onclick="EditValid()return false;">
		</form>
		</div>';
			
                    } 

                    ?>
    
    
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


