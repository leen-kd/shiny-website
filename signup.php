<?php
include 'config.php';

if (isset($_POST['signup'])) {

    $ID = $_POST['ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];

    if ($ID == "") {
        echo "<script>alert('Please enter your ID!');</script>";
    } else if ($fname == "") {
        echo "<script>alert('Please enter your first name!');</script>";
    } else if ($lname == "") {
        echo "<script>alert('Please enter your last name!');</script>";
    } else if ($password == "" || strlen($password) < 8) {
        echo "<script>alert('Please enter a password, must be at least 8 characters');</script>";
    } else {
        $sql = "SELECT * FROM admin WHERE ID = '$ID'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 0) {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO admin(ID, firstName, lastName,  password) VALUES ('$ID','$fname','$lname', '$hashed_password')";

            $result = mysqli_query($db, $sql);

            if ($result) {
                $sql = "SELECT * FROM admin WHERE ID = '$ID'";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_row($result);
                session_start();
                $_SESSION["id"] = $row[0];
                $_SESSION["role"] = 'admin';
                header("Location: index.php");
            } else {
                echo "<script>alert('Couldn't Register something went wrong');</script>";
            }
        } else {
            echo "<script>alert('ID is already exited');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign-up</title>
        <link href="css/index.css" rel="stylesheet">
        <link href="css/nav.css" rel="stylesheet">
        <link href="css/nav2.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/valid.js"></script>
    </head>
    <body>



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
                                <li > <?php echo '<a href="normal.php?ID=3">' ?>Dry Skin</a></li>
                                <li > <?php echo '<a href="normal.php?ID=2">' ?>Oily Skin</a></li>
                                <li >  <?php echo '<a href="normal.php?ID=1">' ?>Normal Skin</a></li>
                                <li>  <?php echo '<a href="normal.php?ID=4">' ?>Combination Skin</a></li>
                                <li>  <?php echo '<a href="normal.php?ID=5">' ?>Sensitive Skin</a></li>
                            </ul>


                        </li>
                        <li><a href="index.php" accesskey="H">Home</a></li>
                    </ul>
                </nav>
            </header>
        </div>


        <div>


            <div class="row3">  
                <div class="container">
                    <form name="signup" class="form1" action="signup.php" method="POST">
                        <fieldset>
                            <legend>Admin Sign up</legend>
                            <br>
                            <br>
                            <input type="text" placeholder="ID" name="ID" autofocus/><br> 
                            <input type="text" placeholder="First name" name="fname" autofocus/><br> 
                            <input type="text" placeholder="Last name" name="lname" autofocus/><br> 
                            <input type="password" placeholder="Password" name="password"/><br>


                            <input type="submit" class="submit" name='signup' value="sign-up">
                            

                        </fieldset>
                    </form>

                </div>
            </div>

            <div id="m" class="wrapper row5">
                <div id="copyright" class="hoc clear">
                    <footer>
                        <p  class="copyright">Copyright &copy; 2022 shiny, inc.</p>
                    </footer>
                </div>
            </div>
    </body>
</html>
