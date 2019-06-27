<link rel="stylesheet" href="../css/master.prefixed.min.css">
<link rel="stylesheet" href="../css/admin.prefixed.min.css">
<link rel="stylesheet" href="../css/form.prefixed.min.css">
<style>
  .admin-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  section.delete-confirm {
    border: 3px solid black;
    border-radius: 5px;
    padding: 25px;
  }
</style>

<?php
session_start();
$title = "Edit/Delete Post";
$pid;
if(isset($_SESSION['userUid'])) {
  require 'dbh.inc.php';
  if(isset($_POST['edit-post']) || isset($_POST['edit-newsletter'])) {
    if(isset($_POST['pid'])) {
      $pid = $_POST['pid'];
      header("Location: ../edit.php?pid=".$pid);
      exit();
    }else{
      $id = $_POST['id'];
      header("Location: ../edit.php?id=".$id);
      exit();
    }
  }elseif(isset($_POST['delete-post']) || isset($_POST['delete-newsletter'])) {
    if(isset($_POST['delete-post'])) {
      $pid = $_POST['pid'];
      echo('<main class="admin-wrapper">
      <section class="delete-confirm">
        <p class="delete-confirm">
          Are You Sure You Want to Delete This Article?
        </p>
        <br>
        <form action="edit-delete-id.inc.php" method="post">
          <input type="hidden" name="pid" value="'.$pid.'">
          <button class="styled" type="submit" name="delete-confirm">Delete</button>
          <button class="styled" type="submit" name="delete-cancel">Cancel</button>
        </form>
        </section>
        </main>');
      }else{
        $id = $_POST['id'];
        echo('<main class="admin-wrapper">
        <section class="delete-confirm">
          <p class="delete-confirm">
            Are You Sure You Want to Delete This Newsletter?
          </p>
          <br>
          <form action="edit-delete-id.inc.php" method="post">
            <input type="hidden" name="id" value="'.$id.'">
            <button class="styled" type="submit" name="delete-confirm">Delete</button>
            <button class="styled" type="submit" name="delete-cancel">Cancel</button>
          </form>
          </section>
          </main>');
      }
  }elseif(isset($_POST['delete-confirm'])) {
    if(isset($_POST['pid'])) {
      $pid = $_POST['pid'];
      $sql = "SELECT * FROM articleimages WHERE imgPid=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {

      }else{
        mysqli_stmt_bind_param($stmt, "i", $pid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)) {
          $imgId = $row['imgId'];
          $sqlImage = "DELETE FROM articleimages WHERE imgId=$imgId";
          mysqli_query($conn, $sqlImage);
        }
      }
      $sql = "DELETE FROM posts WHERE pid=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {

      }else{
        mysqli_stmt_bind_param($stmt, "i", $pid);
        mysqli_stmt_execute($stmt);
      }
      header("Location: ../edit-delete-posts.h.php");
      exit();
    }elseif(isset($_POST['id'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM newsletters WHERE id=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)) {

      }else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
      }
      header("Location: ../edit-delete-newsletters.h.php");
      exit();
    }
  }else{
    header("Location: ../index.php");
    exit();
  }
}else{
  header("Location: ../index.php");
  exit();
}
