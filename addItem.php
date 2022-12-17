<?php
include 'config.php';
session_start();
if ($_SESSION["role"] != "admin" || !isset($_SESSION['id'])) {
    header("Location: index.php");
}
if (isset($_POST['add'])) {

    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    $uploadFileDir = 'uploads//';
    
    $picName = $_FILES['pic']['name'];
    $picTmp = $_FILES['pic']['tmp_name'];
    $ex = explode('.', $picName);
    $picExtension = strtolower(end($ex));
    if($picName == null){
        $new_name = null;
    }else{
    $new_name = uniqid('',true) . '.' . $picExtension;}
    move_uploaded_file($picTmp, $uploadFileDir . $new_name);
     
    

    if ($brand == "") {
        echo "<script>alert('Please enter brand name');</script>";
    } else if ($name == "") {
        echo "<script>alert('Please enter product name');</script>";
    } else if ($description == "") {
        echo "<script>alert('Please enter description');</script>";
    } else if (!is_numeric($price)) {
        echo "<script>alert('Price must be a number');</script>";
    } else if ($picName == "") {
        echo "<script>alert('Please upload an image');</script>";
    } else {
        $sql = "SELECT * FROM item WHERE name = $name";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) <= 0) {
            
            $sql = "INSERT INTO item(idSkin, brand, name, description, price, pic, saved) VALUES ('$type', '$brand','$name','$description','$price','$new_name', '0')";
            $result = mysqli_query($db, $sql);
            if($result){
                $msg = "The product is added successfully";
             
                 header('Location: index.php?msg='.$msg);
            
            } else{
                 echo "<script>alert('Could not add the  product!')</script>";
            }
            
            
        } else {
        echo "<script>alert('This product is already exist')</script>";
       }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link href="css/index.css" rel="stylesheet">
        <link href="css/nav.css" rel="stylesheet">
        <link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/valid.js"></script>

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
                <form name="add" class="form1" action="addItem.php" method="POST" enctype="multipart/form-data">
                    <fieldset>

                        <legend>ADD PRODUCT</legend>
                        <p> Product Brand:</p> 
                        <input type="text" placeholder="new Brand name" name="brand"> 
                        <p> Product Name:</p> 
                        <input type="text" placeholder="new Name" name="name">
                        <label>Skin Type: </label>
                        <select name="type">
                            <option value="1">Normal</option>
                            <option value="2">Oily</option>
                            <option value="3">Dry</option>
                            <option value="4">Combination</option>
                            <option value="5">Sensitive</option>
                        </select>
                        <p> Product Description:</p> 
                        <input type="text" placeholder="new Description" name="description">
                        <p> Product Price:</p> 
                        <input type="text" placeholder="new Price"  name="price">
                        <p> Product Picture:</p> 
                        <input type="file"  name="pic">
                        <br/>
                        <input type="submit" name="add" class="submit" onclick="">

                        </form>

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
