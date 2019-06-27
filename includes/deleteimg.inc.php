<?php
require '../header.php';
if(isset($_SESSION['userUid'])) {
  if(isset($_POST['delete-submit'])) {
    require 'dbh.inc.php';
    $pid = $_POST['pid'];
    $imgId = $_POST['imgId'];
    $sql = "DELETE FROM articleimages WHERE imgId=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {

    }else{
      mysqli_stmt_bind_param($stmt, "i", $imgId);
      mysqli_stmt_execute($stmt);
      header("Location: ../edit.php?pid=".$pid);
      exit();
    }
  }
}else{
  header("Location: ../index.php");
}
?>
