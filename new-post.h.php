<link rel="stylesheet" href="css/form.prefixed.min.css">
<?php
  $title = "Create a Post";
  require 'header.php';
  date_default_timezone_set('America/New_York');
if(isset($_SESSION['userUid'])) {
  ?>
  <link rel="stylesheet" href="css/admin.css">
  <script>
  $(document).ready(function() {
    $("button[name='post-submit']").attr("disabled", true);
    $("input").keyup(function() {
      if(($("input[name='uid']").val() != '') && ($("input[name='date']").val() != '') && ($("input[name='title']").val() != '') && ($("input[name='author']").val() != '') && ($("textarea[name='message']").val() != '')) {
        $("button[name='post-submit']").attr("disabled", false);
      }else{
        $("button[name='post-submit']").attr("disabled", true);
      }
    });
    $("textarea").keyup(function() {
      if(($("input[name='uid']").val() != '') && ($("input[name='date']").val() != '') && ($("input[name='title']").val() != '') && ($("input[name='author']").val() != '') && ($("textarea[name='message']").val() != '')) {
        $("button[name='post-submit']").attr("disabled", false);
      }else{
        $("button[name='post-submit']").attr("disabled", true);
      }
    });
  });
  </script>
  <style>
  .admin-wrapper {
    display:flex;
    justify-content: center;
    flex-flow:column;
  }
  </style>
  <?php
  echo('<main class="admin-wrapper">
    <form class="new-post" action="includes/post.inc.php" method="post">
      <input type="hidden" name="uid" value="'.$_SESSION['userUid'].'">
      <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
      <input type="text" name="title" placeholder="Title">
      <input type="text" name="author" placeholder="Author">
      <textarea name="message" placeholder="Enter the body of your article"></textarea>
      <button class="styled" type="submit" name="post-submit" style="height:50px">Submit</button>
    </form>
  </main>');
  ?>
<?php
  }else{
    header("Location: index.php");
    exit();
  }
?>
