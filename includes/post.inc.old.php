<?php
require '../header.php';
if(isset($_SESSION['userUid'])) {
  if(isset($_POST['post-submit'])) {
    require 'dbh.inc.php';
    $uid = $_POST['uid'];
    $authorName = $_POST['author'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $aut = mysqli_real_escape_string($conn, $authorName);
    $tit = mysqli_real_escape_string($conn, $title);
    $mess = mysqli_real_escape_string($conn, $message);
    $sql = "INSERT INTO posts (uid, authorName, title, date, message) VALUES ('$uid', '$aut', '$tit', '$date', '$mess')";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }else{
      mysqli_query($conn, $sql);
      header("Location: ../upload-img.h.php?lastPost=true");
      exit();
    }
  }elseif(isset($_POST['edit-submit'])) {
    require 'dbh.inc.php';
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $authorName = $_POST['author'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $aut = mysqli_real_escape_string($conn, $authorName);
    $tit = mysqli_real_escape_string($conn, $title);
    $mess = mysqli_real_escape_string($conn, $message);
    $sql = "UPDATE posts SET uid='$uid', authorName='$aut', title='$tit', date='$date', message='$mess' WHERE pid = '$pid'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }else{
      mysqli_query($conn, $sql);
      header("Location: ../article.php?id=".$pid);
      exit();
    }
  }
}else{
  header("Location: index.php");
}
