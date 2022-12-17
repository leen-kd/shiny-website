<?php
include 'config.php';

if(isset($_GET['iditem'])){
  $id  = $_GET['iditem'];
  $sql= "DELETE FROM item WHERE id ='$id'";
 $result= mysqli_query($db, $sql);
 if(isset($_GET['ID'])){
    $file=$_GET['ID'];
    header('Location: normal.php?ID='.$file.'delete Successfully&&id='.$id.'');
}}
if(isset($_GET['id'])){
     $id  = $_GET['id'];
     $sql= "UPDATE `item` SET saved='0' WHERE id ='$id'";
     $result= mysqli_query($db, $sql);
     header('Location: wishlist.php');

}
?>