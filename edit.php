<link rel="stylesheet" href="css/admin.prefixed.min.css">
<link rel="stylesheet" href="css/form.prefixed.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  flex-flow:column;
}
</style>
<?php
  $title = "Edit Post";
  require 'header.php';
  if(isset($_SESSION['userUid'])) {
    if(isset($_GET['pid'])) {
      echo('<main class="admin-wrapper">');
      require 'includes/dbh.inc.php';
      $pid = $_GET['pid'];
      $sql = "SELECT * FROM posts WHERE pid= ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {

      }else{
        mysqli_stmt_bind_param($stmt, "i", $pid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
          $title = $row['title'];
          $author = $row['authorName'];
          $date = $row['date'];
          $message = $row['message'];
          echo('
          <form class="edit-post" action="includes/post.inc.php" method="post">
              <input type="hidden" name="pid" value="'.$pid.'">
              <input type="hidden" name="uid" value="'.$_SESSION['userUid'].'">
              <input type="hidden" name="date" value="'.$date.'">
              <input type="text" name="title" placeholder="Title" value="'.$title.'">
              <input type="text" name="author" placeholder="Author" value="'.$author.'">
              <textarea name="message" placeholder="Enter the body of your article">'.$message.'</textarea>
              <button type="submit" name="edit-submit" style="height:50px">Submit</button>
            </form>');
          echo('<section class="images">');
          $sql = "SELECT * FROM articleimages WHERE imgPid=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
          }else{
            mysqli_stmt_bind_param($stmt, "i", $pid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)) {
              $imgId = $row['imgId'];
              $imgPid = $row['imgPid'];
              $imgTitle = $row['imgTitle'];
              $img = $row['imgData'];
              echo('<img class="'.$imgId.'" src="data:image/JPG;base64,'.base64_encode($img).'" width="200px" height="200px">
              <form class="delete-img" action="includes/deleteimg.inc.php" method="post">
                <input type="hidden" name="pid" value="'.$pid.'">
                <input type="hidden" name="imgId" value="'.$imgId.'">
                <button class="styled" type="submit" name="delete-submit">Delete Image</button>
              </form>');
            }
            echo('</section>');
          }
        }else{
          echo('Error: No Article Found');
          exit();
        }
      }
      echo('<a class="upload-img-button" href="upload-img.h.php?pid='.$pid.'" target="_blank">Upload Images</a>');
    }elseif(isset($_GET['id'])){
      $id = $_GET['id'];
      echo('<main class="admin-wrapper">');
      require 'includes/dbh.inc.php';
      $sql = "SELECT * FROM newsletters WHERE id=?";
      $stmt = mysqli_stmt_init($conn);
      $result = mysqli_query($conn, $sql);
      if(!mysqli_stmt_prepare($stmt, $sql)) {

      }else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
          $title = $row['newsletterYear'];
          require 'includes/uploadnewsletter.inc.php';
          echo('
          <form class="upload-newsletters" action="'.upload().'" method="post" enctype="multipart/form-data">
            <h1 class="upload-newsletters">Update '.$title.' Newsletter</h1>');
            if(isset($_GET['upload'])) {
              if($_GET['upload'] == "success") {
                echo('<h4>Upload Success!</h4>');
              }
            }
            echo('
            <input type="file" name="newsletter" accept="application/pdf">
            <input type="hidden" name="newsletter-year" value="'.$title.'">
            <button class="styled" type="submit" name="newsletter-edit-submit">Upload</button>
            <button class="styled" type="submit" name="next-button">Next</button>
          </form>
          ');
        }else{
          echo('Error: No Newsletter Found');
          exit();
        }
      }
    }else{
      header("Location: index.php");
      exit();
    }
  }else{
    header("Location: index.php");
    exit();
  }
