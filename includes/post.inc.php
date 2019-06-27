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

    $sql = "INSERT INTO posts (uid, authorName, title, date, message) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "issss", $uid, $authorName, $title, $date, $message);
      mysqli_stmt_execute($stmt);
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

    $sql = "UPDATE posts SET uid=?, authorName=?, title=?, date=?, message=? WHERE pid =?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "issssi", $uid, $authorName, $title, $date, $message, $pid);
      mysqli_stmt_execute($stmt);
      header("Location: ../article.php?id=".$pid);
      exit();
    }
  }
}else{
  header("Location: index.php");
}
