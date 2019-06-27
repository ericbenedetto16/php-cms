<?php
if(isset($_SESSION['userUid'])) {
  function getPosts() {
    require 'dbh.inc.php';
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $pid = $row['pid'];
      $title = $row['title'];
      $author = $row['authorName'];
      $date = $row['date'];
      $message = $row['message'];
      echo('<div class="post-div '.$pid.'">
        <section class="title">
        '.$title.'
        </section>');
      echo('
      <section class="author-date">
        '.$author.' <br> '.$date.'
      </section>');
    echo('</div>
    <form class="edit-delete-form" action="includes/edit-delete-id.inc.php" method="post">
      <input type="hidden" name="pid" value="'.$pid.'">
      <button class="styled" type="submit" name="edit-post">Edit</button>
      <button class="styled" type="submit" name="delete-post">Delete</button>
    </form>');
    }
  }
}else{
  header("Location: ../index.php");
  exit();
}
