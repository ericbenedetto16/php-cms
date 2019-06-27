<?php

require "dbh.inc.php";

$uid = "admin";
$password = "I$/ks&*sjvnka120dj2#890nks";
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (uidAdmin, pwdAdmin) VALUES (?,?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
  header("Location: ../index.php?error=sqlerror&uid=".$username);
  exit();
}else{
  mysqli_stmt_bind_param($stmt, "ss", $uid, $hashedPwd);
  mysqli_stmt_execute($stmt);
}
?>
