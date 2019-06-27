<?php
$title = "Upload Images!";
require 'header.php';
if(isset($_SESSION['userUid'])) {
  if(isset($_POST['image-submit'])) {
    $file = $_FILES['image']['tmp_name'];

    if(!isset($file)) {
      echo "Please select an image";
    }else{
      echo $image = file_get_contents($_FILES['images']['tmp_name']);
      $image_name = $_FILES['image']['name'];
    }
  }
}
