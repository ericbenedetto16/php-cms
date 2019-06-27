<?php
if(isset($_SESSION['userUid'])) {
  function getNewsletters() {
    require 'dbh.inc.php';
    $sql = "SELECT * FROM newsletters ORDER BY newsletterYear ASC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $title = $row['newsletterYear'];
      $document = $row['newsletterData'];

      echo('
      <div class="newsletter-div '.$id.'">
        <section class="title">
        '.$title.'
        </section>
        </div>
        <form class="edit-delete-form" action="includes/edit-delete-id.inc.php" method="post">
          <input type="hidden" name="id" value="'.$id.'">
          <button class="styled" type="submit" name="edit-newsletter">Edit</button>
          <button class="styled" type="submit" name="delete-newsletter">Delete</button>
        </form>
      ');
    }
  }
}else{
  header("Location: ../index.php");
  exit();
}
