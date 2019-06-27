<?php
if(isset($_SESSION['userUid'])) {
  function upload() {
    if(isset($_POST['newsletter-upload-submit'])) {
      require 'includes/dbh.inc.php';
      $documentTmp = $_FILES['newsletter']['tmp_name'];
      if(empty($documentTmp)) {
        echo("No Document Selected");
        header("Location: newsletter-upload.h.php");
        exit();
      }else{
        $document = addslashes(file_get_contents($_FILES['newsletter']['tmp_name']));
        $document_name = addslashes($_FILES['newsletter']['name']);
        $document_size = filesize($_FILES['newsletter']['tmp_name']);
        $document_year = $_POST['newsletter-year'];

        if($document_size == false) {
          echo("Invalid Filetype");
          header("Location: newsletter-upload.h.php");
          exit();
        }else{
          $sql = "INSERT INTO newsletters (newsletterTitle, newsletterYear, newsletterData) VALUES ('$document_name', '$document_year', '$document')";
          mysqli_query($conn, $sql);
          header("Location: newsletter-upload.h.php?upload=success");
          exit();
        }
      }
    }elseif(isset($_POST['next-button'])) {
      header("Location: newsletters.php");
      exit();
    }elseif(isset($_POST['newsletter-edit-submit'])) {
      require 'includes/dbh.inc.php';
      $documentTmp = $_FILES['newsletter']['tmp_name'];
      if(empty($documentTmp)) {
        echo("No Document Selected");
      }else{
        $document = addslashes(file_get_contents($_FILES['newsletter']['tmp_name']));
        $document_name = addslashes($_FILES['newsletter']['name']);
        $document_size = filesize($_FILES['newsletter']['tmp_name']);
        $document_year = $_POST['newsletter-year'];

        if($document_size == false) {
          echo("Invalid Filetype");
          header("Location: newsletter-upload.h.php");
          exit();
        }else{
          $sql = "UPDATE newsletters SET newsletterTitle ='$document_name', newsletterData ='$document' WHERE newsletterYear='$document_year'";
          mysqli_query($conn, $sql);
          header("Location: edit.php?id=".$_GET['id']."&upload=success");
          exit();
        }
      }
    }else{

    }
  }
}else{
  header("Location: ../index.php");
  exit();
}
