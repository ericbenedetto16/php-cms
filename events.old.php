<?php
  $title = "Events & Articles";
  require 'header.php';
?>

<main class="events-container">
  <section class="events">
    <h1 class="events-page">Upcoming Events</h1>
    <iframe class="googlecalendar events-page" src="https://calendar.google.com/calendar/b/1/embed?showTitle=0&amp;showNav=0&amp;showTz=0&amp;mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=bene9555%40portrichmondhs.org&amp;color=%2329527A&amp;ctz=America%2FNew_York" frameborder="0">
    </iframe>
  </section>
  <section class="article-preview-container">
    <h1 class="events-page">Articles</h1>
    <section class="article-preview">
      <?php
        require 'includes/dbh.inc.php';
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          $imgBool = false;
          $pid = $row['pid'];
          $query = "SELECT * FROM articleimages WHERE imgPid='$pid' ORDER BY imgId DESC LIMIT 1";
          $imgResult = mysqli_query($conn, $query);
          while($imgRow = mysqli_fetch_assoc($imgResult)) {
            $imgBool = true;
            echo('<div class="articleinfo-container">
              <div class="article-info-child">
                <img class="article-info" src="data:image/JPG;base64,'.base64_encode($imgRow['imgData']).'" alt="" width="100" height="100">
                <div class="article-info '.$pid.'">
                  <a href="article.php?id='.$pid.'"><h1 class="article-info">'.$row['title'].'</h1></a>
                  <p class="article-info">'.$row['authorName'].' '.$row['date'].'</p>
                </div>
              </div>
            ');
          }
          if($imgBool == false) {
            echo('<div class="articleinfo-container">
              <div class="article-info-child">
                <div class="article-info noimgpreview"></div>
                <div class="article-info '.$pid.'">
                  <a href="article.php?id='.$pid.'"><h1 class="article-info">'.$row['title'].'</h1></a>
                  <p class="article-info">'.$row['authorName'].' '.$row['date'].'</p>
                </div>
              </div>
            </div>');
          }else{
            echo('</div>');
         }
        }
      ?>
    </section>
  </section>
</main>

<?php
  require 'footer.php';
?>
