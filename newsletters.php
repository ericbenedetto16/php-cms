<?php
  $title="Newsletter Archives";
  require 'header.php';
?>
<style>
  a.newsletter {
    text-decoration: underline;
  }
  div {
    text-align: left;
  }
</style>
<main>
  <h1 class="newsletter">Newsletter Archives</h1>
  <p class="newsletter"><br>Take a look at our Newsletter's, old and new. Here is the collection of our archives:</p>
  <?php
    require 'includes/dbh.inc.php';
    $sql = "SELECT * FROM newsletters ORDER BY newsletterYear ASC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $title = $row['newsletterYear'];
      $document = $row['newsletterData'];

      echo('<div class="'.$title.'">
        <a class="newsletter" href="data:application/pdf;base64,'.base64_encode($document).'" download="Port Richmond Alumni Newsletter - '.$title.'">'.$title.'</a>
      </div>');
    }

  ?>
</main>

<?php
  require 'footer.php';
?>
