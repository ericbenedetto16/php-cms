<link rel="stylesheet" href="css/admin.prefixed.min.css">
<link rel="stylesheet" href="css/form.prefixed.min.css">
<?php
  $title = "Upload Newsletters!";
  require 'header.php';
  require 'includes/uploadnewsletter.inc.php';

  if(isset($_SESSION['userUid'])) {
    echo('
    <main class="admin-wrapper">
        <form class="upload-newsletters" action="'.upload().'" method="post" enctype="multipart/form-data">
          <h1 class="upload-newsletters">Upload Newsletters</h1>');
          if(isset($_GET['upload'])) {
            if($_GET['upload'] == "success") {
              echo('<h4>Upload Success!</h4>');
            }
          }
          echo('
          <input type="file" name="newsletter" accept="application/pdf">
          <input type="number" name="newsletter-year" placeholder="Year of Issue">
          <button class="styled" type="submit" name="newsletter-upload-submit">Upload</button>
          <button class="styled" type="submit" name="next-button">Next</button>
        </form>
    </main>');
  }else{
    header("Location: index.php");
  }
?>
<script>
$(document).ready(function() {
  $("button[name='newsletter-upload-submit']").attr("disabled",true);
  $("input").keyup(function() {
    if(($("input[name='year']").val() != '')) {
      $("button[name='newsletter-upload-submit']").attr("disabled",false);
    }
  });
});
</script>
