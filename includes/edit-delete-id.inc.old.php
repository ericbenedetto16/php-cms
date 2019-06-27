<link rel="stylesheet" href="../css/master.prefixed.min.css">
<link rel="stylesheet" href="../css/admin.prefixed.min.css">
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
$title = "Edit/Delete Post";
require '../header.php';
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
          <button type="submit" name="delete-confirm">Delete</button>
          <button type="submit" name="delete-cancel">Cancel</button>
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
            <button type="submit" name="delete-confirm">Delete</button>
            <button type="submit" name="delete-cancel">Cancel</button>
          </form>
          </section>
          </main>');
      }
  }elseif(isset($_POST['delete-confirm'])) {
    if(isset($_POST['pid'])) {
      $pid = $_POST['pid'];
      $pSql = "SELECT * FROM posts WHERE pid=$pid";
      $pResult = mysqli_query($conn, $pSql);
      $pRow = mysqli_fetch_assoc($pResult);

      $sql1 = "SELECT * FROM articleimages WHERE imgPid=$pid";
      $result1 = mysqli_query($conn, $sql1);
      while($row1 = mysqli_fetch_assoc($result1)) {
        $imgId = $row1['imgId'];
        $sqlImage = "DELETE FROM articleimages WHERE imgId=$imgId";
        mysqli_query($conn, $sqlImage);
      }

      $sql = "DELETE FROM posts WHERE pid=$pid";
      mysqli_query($conn, $sql);
      header("Location: ../edit-delete-posts.h.php");
      exit();
    }elseif(isset($_POST['id'])) {
      $id = $_POST['id'];
      $nSql = "DELETE FROM newsletters WHERE id=$id";
      mysqli_query($conn, $nSql);
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
