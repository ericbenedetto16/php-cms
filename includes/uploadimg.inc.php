<?php
if(isset($_SESSION['userUid'])) {
  function upload() {
    if(isset($_POST['image-submit'])) {
      require 'includes/dbh.inc.php';
      if(isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $imageTmp = $_FILES['image']['tmp_name'];
        if(empty($imageTmp)) {
          echo("No Image Selected");
        }else{
          $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);
          if($image_size == false) {
            echo("Invalid Filetype");
          }else{
            $sql = "INSERT INTO articleimages (imgPid, imgTitle, imgData) VALUES ('$pid', '$image_name', '$image')";
            mysqli_query($conn, $sql);
            header("Location: upload-img.h.php?pid=".$pid);
            exit();
          }
        }
      }elseif(!isset($_GET['pid']) && (isset($_GET['lastPost']))){
        $imageTmp = $_FILES['image']['tmp_name'];
        if(empty($imageTmp)) {
          echo("No Image Selected");
        }else{
          $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);

          if($image_size == false) {
            echo("Invalid Filetype");
          }else{
            $query = "SELECT * FROM posts";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)) {
              $pid = $row['pid'];
            }
            $sql = "INSERT INTO articleimages (imgPid, imgTitle, imgData) VALUES ('$pid', '$image_name', '$image')";
            mysqli_query($conn, $sql);
            header("Location: upload-img.h.php?pid=".$pid);
            exit();
          }
        }
      }
    }elseif(isset($_POST['next-button'])) {
      header("Location: edit-delete-posts.h.php");
    }
  }
}else{
  header("Location: ../index.php");
  exit();
}
