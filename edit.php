<?php
include 'config.php';
if(isset($_POST['id'])){
    $id  = $_POST['id'];
    $brand  = $_POST['brand'];    
    $name  = $_POST['name'];
    $description  = $_POST['description'];
    $price  = $_POST['price'];
    $idSkin=$_POST['skinId'];
      
      
     if ($brand == "") {
      $msg='Please enter brand name';
       header('Location: editItem.php?msg='.$msg.'&&itemId='.$id);
    } else if ($name == "") {
      $msg='Please enter product name';
       header('Location: editItem.php?msg='.$msg.'&&itemId='.$id);
    } else if ($description == "") {
        $msg='Please enter description';
	 header('Location: editItem.php?msg='.$msg.'&&itemId='.$id);
    } else if ($price== "") {
       $msg='Please enter product Price';
        header('Location: editItem.php?msg='.$msg.'&&itemId='.$id);
    } else if (!is_numeric($price)) {
       $msg='Price must be a number';
       header('Location: editItem.php?msg='.$msg.'&&itemId='.$id);
    //} else if ($image == "") {
      //  $msg='Please upload an image';
    }else{

    $sql= 'UPDATE `item` SET brand="'.$brand.'", name="'.$name.'" , description="'.$description.'", price="'.$price.'" WHERE id='.$id.'' ;
    $result= mysqli_query($db, $sql);
    $msg="info Updated Successfully";
    
      $uploadFileDir = 'uploads//';

     if(!empty($_FILES['image']['name'])){
        
      $imageName = $_FILES['image']['name'];
      $imageTmp	= $_FILES['image']['tmp_name'];
      $ex1 = explode('.', $imageName);
      $fileExtension1 = strtolower(end($ex1));
      
    $new_name1 = uniqid('',true) . '.' . $fileExtension1;
    move_uploaded_file($imageTmp, $uploadFileDir . $new_name1);
     $sql= 'UPDATE `item` SET  `pic`="'.$new_name1.'" WHERE id='.$id.' ';
     $result= mysqli_query($db, $sql);
      }  
  
     header('Location: normal.php?ID='.$idSkin.'&&msg='.$msg.'&&itemId='.$id);

      }
       

 }
