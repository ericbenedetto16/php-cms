<?php
  $title = "Port Richmond Alumni Association";
  require "header.php";

  if(isset($_SESSION['userUid'])){
    if($_SESSION['userUid'] == 'admin') {
      echo('<script>window.location.replace("admin-panel.php")</script>');
      exit();
    }
  }
?>
<link rel="stylesheet" href="css/sidebar.prefixed.min.css">
<div class="main-container">
  <?php
    require "left-sidebar.php";
  ?>
  <main class="index">
    <div class="carousel-container">
      <section class="carousel">
        <?php
        require "includes/dbh.inc.php";

        $pidLast;
        $sql = "SELECT * FROM articleimages ORDER BY imgPid DESC";
        $result = mysqli_query($conn, $sql);
        for($i = 0; $i < 5; $i++) {
          if($row = mysqli_fetch_assoc($result)) {
            $pid = $row['imgPid'];
            if($i > 0 && $row['imgPid'] == $pidLast) {
              $i--;
            }else{
              $imgId = $row['imgId'];
              $img = $row['imgData'];
              $pidLast = $pid;
              echo('<a href="article.php?id='.$pid.'" style="min-width:100%"><img class="carousel_img '.$pid.'" src="data:image/JPG;base64,'.base64_encode($img).'" alt=""></a>');
            }
          }else{

          }
        }
        ?>
        <button class="left" onclick="plus(-1)">&#10094;</button>
        <button class="right" onclick="plus(1)">&#10095;</button>
        <script src="js/carousel.min.js"></script>
      </section>
    </div>
    <section class="banner-container">
      <section class="social-holder">
        <a class="social-badge" href="https://www.instagram.com/portrichmondhsalumni/" target=_blank><img class="social-badge" src="img/iconmonstr-instagram-11-240.png" ></a>
        <a class="social-badge" href="https://www.twitter.com/PortAlumni" target=_blank><img class="social-badge" src="img/iconmonstr-twitter-1-240.png"></a>
      </section>
      <p class="banner-text">Stay In The Loop With Us!</p>
      <section class="social-holder">
        <a class="social-badge" href="https://www.facebook.com/PortRichmondAlumni/" target=_blank><img class="social-badge" src="img/iconmonstr-facebook-1-240.png"></a>
        <a class="social-badge" href="https://www.vimeo.com/prhstv" target=_blank><img class="social-badge" src="img/iconmonstr-vimeo-3-240.png"></a>
      </section>
    </section>
    <section class="widget-container">
      <iframe class="googlecalendar" src="https://calendar.google.com/calendar/b/1/embed?showTitle=0&amp;showNav=0&amp;showTz=0&amp;mode=MONTH&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=bene9555%40portrichmondhs.org&amp;color=%2329527A&amp;ctz=America%2FNew_York" frameborder="0">
      </iframe>
      <!-- PayPal Donation Button -->

      <div class="twitter-frame">
        <a class="twitter-timeline" href="https://twitter.com/TwitterDev/timelines/539487832448843776?ref_src=twsrc%5Etfw" data-height="500">National Park Tweets - Curated tweets by TwitterDev</a>
        <script async src="https://platform.twitter.com/widgets.js"charset="utf-8"></script>
      </div>
    </section>
  </main>
  <?php
    require "right-sidebar.php";
  ?>
</div>

<?php
  require "footer.php";
?>
