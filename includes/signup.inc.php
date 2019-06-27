<?php
if(isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['mail'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $year = $_POST['year'];


  if(empty($firstname) || empty($lastname) || empty($email) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($year)) {
    header("Location: ../signup.php?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&mail=".$email."&year=".$year);
    exit();
  }elseif(!preg_match("/^[a-zA-Z]*$/",$firstname) && !preg_match("/^[a-zA-Z]*$/", $lastname)) {
    header("Location: ../signup.php?error=invalidnames&mail=".$email."&year=".$year);
    exit();
  }elseif(!preg_match("/^[a-zA-Z]*$/",$firstname)) {
    header("Location: ../signup.php?error=invalidfirst&lastname=".$lastname."&mail=".$email."&year=".$year);
    exit();
  }elseif(!preg_match("/^[a-zA-Z]*$/",$lastname)) {
    header("Location: ../signup.php?error=invalidlast&firstname=".$firstname."&mail=".$email."&year=".$year);
    exit();
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&firstname=".$firstname."&lastname=".$lastname."&year=".$year);
    exit();
  }elseif(!preg_match("/^[a-zA-Z0-9 \s]*$/", $address) || !preg_match("/^[a-zA-Z]{2}$/i", $state) || !preg_match("/^[a-zA-Z \s]*$/", $city) || !preg_match("/^[0-9]{5}$/i", $zip)) {
    header("Location: ../signup.php?error=invalidaddress&firstname=".$firstname."&lastname=".$lastname."&mail=".$email."&year=".$year);
    exit();
  }elseif(!preg_match("/^[0-9]{4}$/i", $year)){
    header("Location: ../signup.php?error=invalidyear&firstname=".$firstname."&lastname=".$lastname."&mail=".$email);
    exit();
  }else{
    $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0) {
        header("Location: ../signup.php?error=emailexists&firstname=".$firstname."&lastname=".$lastname."&year=".$year);
        exit();
      }else{
        $sql = "INSERT INTO users (firstName, lastName, emailUsers, address, state, city, zip, gradYear) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror&firstname=".$firstname."&lastname=".$lastname."&mail=".$email."&year=".$year);
          exit();
        }else{
          mysqli_stmt_bind_param($stmt, "ssssssii", $firstname, $lastname, $email, $address, $state, $city, $zip, $year);
          mysqli_stmt_execute($stmt);

          $mailTo = $email;
          $mailFrom = "donotreply@portrichmondhsalumni.org";
          $subject = "Welcome to the Port Richmond Family, ".$firstname."!";
          $headers = "From: ".$mailFrom;
          $body = "Welcome to the Port Richmond High School Alumni Community!\nThank you for your steadfast dedication to your school!\n\nEmail us with any questions at alumni@portichmondhs.org\nThe Board of the PRHS Alumni Association";
          $message = $firstname." ".$lastname.",\n\n".$body;
          mail($mailTo, $subject, $message, $headers);

          header("Location: ../signup.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}else{
  header("Location: ../index.php");
  exit();
}
