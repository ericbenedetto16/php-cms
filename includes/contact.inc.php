<?php
if(isset($_POST['contact-submit'])) {
  require 'dbh.inc.php';

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];

  if(empty($firstname) || empty($lastname) || empty($mailFrom)) {
    header("Location: ../contact.php?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&mail=".$email);
    exit();
  }elseif(!preg_match("/^[a-zA-Z]*$/",$firstname) && !preg_match("/^[a-zA-Z]*$/", $lastname)) {
    header("Location: ../contact.php?error=invalidnames&mail=".$email."&year=".$year);
    exit();
  }elseif(!preg_match("/^[a-zA-Z]*$/",$firstname)) {
    header("Location: ../contact.php?error=invalidfirst&lastname=".$lastname."&mail=".$email."&year=".$year);
    exit();
  }elseif(!preg_match("/^[a-zA-Z]*$/",$lastname)) {
    header("Location: ../contact.php?error=invalidlast&firstname=".$firstname."&mail=".$email."&year=".$year);
    exit();
  }elseif(!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../contact.php?error=invalidmail&firstname=".$firstname."&lastname=".$lastname."&year=".$year);
    exit();
  }else{
    if(empty($subject)) {
      $subject = "Contact Form Submission From: ".$firstname." ".$lastname;
    }elseif($subject == "general") {
      $subject = "General Inquiry";
    }elseif($subject == "bug") {
      $subject = "Bug Reported";
    }elseif($subject == "info-change") {
      $subject = "".$firstname." ".$lastname." Contact Information Change";
    }
    $mailTo = "ericsplace3@verizon.net";
    $headers = "From: ".$mailFrom;
    $txt = "".$firstname." ".$lastname." says:\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: ../contact.php?submit=success");
    exit();
  }
}else{
  header("Location: ../index.php");
  exit();
}
