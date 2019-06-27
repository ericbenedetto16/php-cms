<link rel="stylesheet" href="css/form.prefixed.min.css">
<?php
  $title = "Edit/Delete a Newsletter";
  require 'header.php';
  require 'includes/getnewsletters.inc.php';
if(isset($_SESSION['userUid'])) {
  echo('
  <link rel="stylesheet" href="css/admin.css">
  <style>
  .admin-wrapper {
    display:flex;
    justify-content: center;
    flex-flow:column;
    height: auto;
  }
  </style>
  <main class="admin-wrapper">
    <div class="post-container">');
      getNewsletters();
    echo('</div>
  </main>');
}else{
  header("Location: index.php");
  exit();
}
?>
