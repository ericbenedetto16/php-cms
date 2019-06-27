<link rel="stylesheet" href="css/admin.prefixed.min.css">
<?php
  $title = "Upload Images!";
  require 'header.php';
  require 'includes/uploadimg.inc.php';

  if(isset($_SESSION['userUid']) && (isset($_GET['pid']) || isset($_GET['lastPost']))) {
    echo('
    <main class="admin-wrapper">
        <form class="upload-images" action="'.upload().'" method="post" enctype="multipart/form-data">
          <h1 class="upload-images">Upload Images</h1>
          <input type="file" name="image" accept="image/*">
          <button type="submit" name="image-submit">Upload</button>
          <button type="submit" name="next-button">Next</button>
        </form>
    </main>');
  }else{
    header("Location: index.php");
  }
?>
