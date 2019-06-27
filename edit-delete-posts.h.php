<link rel="stylesheet" href="css/admin.prefixed.min.css">
<link rel="stylesheet" href="css/form.prefixed.min.css">

<?php
  $title = "Edit/Delete a Post";
  require 'header.php';
  require 'includes/getposts.inc.php';
if(isset($_SESSION['userUid'])) {
  echo('
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
      getPosts();
    echo('</div>
  </main>');
}else{
  header("Location: index.php");
  exit();
}
?>
