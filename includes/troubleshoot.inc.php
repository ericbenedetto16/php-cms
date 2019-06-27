<?php
session_start();

if(isset($_SESSION['userUid'])) {
  if(isset($_POST['troubleshoot-submit'])) {
    require 'dbh.inc.php';

    $mailFrom = 'admin@portrichmondhsalumni.org';
    $message = $_POST['inquiry'];
    $subject = "Troubleshooting Inquiry";

    if(empty($message)) {
      header("Location: ../admin-panel.php?error=empty-fields");
      exit();
    }else{
      $mailTo = "ericsplace3@verizon.net";
      $headers = "From: ".$mailFrom;
      $txt = "Troubleshoot Form Message:\n\n".$message;

      mail($mailTo, $subject, $txt, $headers);
      header("Location: ../admin-panel.php?submit=success");
      exit();
    }
  }
}else{
  header("Location: ../index.php");
  exit();
}
