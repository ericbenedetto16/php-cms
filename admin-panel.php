<?php
  $title = "Admin Panel";
  require 'header.php';
?>

<link rel="stylesheet" href="css/admin.prefixed.min.css">

  <?php
  if(isset($_SESSION['userUid'])) {
    echo('<main class="admin-wrapper">
    <div class="quickaction-wrapper">
      <form class="quickaction" action="new-post.h.php" method="post">
        <button type="submit" name="new-post-submit">Create New Post</button>
      </form>
      <form class="quickaction" action="edit-delete-posts.h.php" method="post">
        <button type="submit" name="edit-delete-post-submit">Manage Posts</button>
      </form>
    </div>
    <div class="quickaction-wrapper">
      <form class="quickaction" action="newsletter-upload.h.php" method="post">
        <button type="submit" name="newsletter-submit">Upload Newsletters</button>
      </form>
      <form class="quickaction" action="edit-delete-newsletters.h.php" method="post">
        <button type="submit" name="edit-delete-newsletter-submit">Edit Newsletters</button>
      </form>
    </div>
    <div class="quickaction-wrapper">
      <form class="quickaction" action="includes/troubleshoot.inc.php" method="post" style="width:80%">
        <textarea name="inquiry" placeholder="Enter Any Problems, Questions, or General Inquiries about the website or admin panel."></textarea>
        <button type="submit" name="troubleshoot-submit" style="min-width: 85px">Send Email</button>
      </form>
    </div>
  </main>');
  }else{
    echo('
    <main class="admin-wrapper" style="display:flex;background:none">
      <div class="login-form  quickaction">
        <form action="includes/login.inc.php" method="post">
          <h1>Admin Login</h1>
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="login-submit">Login</button>
        </form>
      </div>
    </main>');
  }
  ?>
</main>
