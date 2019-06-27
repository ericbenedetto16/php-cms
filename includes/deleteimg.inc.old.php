<?php
require '../header.php';
if(isset($_SESSION['userUid'])) {
  if(isset($_POST['delete-submit'])) {
    require 'dbh.inc.php';
    echo("We are here boys.");
    require 'dbh.inc.php';
    $pid = $_POST['pid'];
    $imgId = $_POST['imgId'];
    $sql = "DELETE FROM articleimages WHERE imgId='$imgId'";
    mysqli_query($conn, $sql);
    header("Location: ../edit.php?pid=".$pid);
    exit();
  }
}else{
  header("Location: ../index.php");
}
?>
