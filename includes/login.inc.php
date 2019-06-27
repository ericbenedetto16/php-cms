<?php
if(isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  $uid = $_POST['uid'];
  $password = $_POST['pwd'];

  if(empty($uid) || empty($password)) {
    header("Location: ../admin-panel.php?error=emptyfields");
    exit();
  }else{
    $sql = "SELECT * FROM admin WHERE uidAdmin=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../admin-panel.php?error=sqlerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "s", $uid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['pwdAdmin']);
        if($pwdCheck == false) {
          header("Location: ../admin-panel.php?error=wrongpwd");
          exit();
        }elseif($pwdCheck == true) {
          session_start();
          $_SESSION['userId'] = $row['idAdmin'];
          $_SESSION['userUid'] = $row['uidAdmin'];
          header("Location: ../admin-panel.php");
          exit();
        }else{
          header("Location: ../admin-panel.php?error=wrongpwd");
          exit();
        }

      }else{
        header("Location: ../admin-panel.php?error=nouser");
        exit();
      }
    }
  }
}else{
  header("Location: ../index.php");
  exit();
}
