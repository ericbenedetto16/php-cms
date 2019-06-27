<?php
  if(isset($_GET['id'])) {
    require 'includes/dbh.inc.php';
    $pid = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE pid= ?";
    $stmt = mysqli_stmt_init($conn);
    $result = mysqli_query($conn, $sql);
    if(!mysqli_stmt_prepare($stmt, $sql)) {

    }else{
      mysqli_stmt_bind_param($stmt, "i", $pid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $author = $row['authorName'];
        $date = $row['date'];
        $message = nl2br($row['message']);
        require 'header.php';

        $sql = "SELECT * FROM articleimages WHERE imgPid=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../index.php?error=sqlerror");
          exit();
        }else{
          mysqli_stmt_bind_param($stmt, "i", $pid);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if($row = mysqli_fetch_assoc($result)) {
            echo('
            <main class="article">
              <article class="article">
                <h2>'.$title.'</h2>
                <div class="carousel-container article">
                  <section class="carousel article">');
                    $sql = "SELECT * FROM articleimages WHERE imgPid='$pid'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      $pid = $row['imgPid'];
                      $imgId = $row['imgId'];
                      $img = $row['imgData'];
                      echo('<img class="carousel_img article '.$pid.'" src="data:image/JPG;base64,'.base64_encode($img).'" alt="">');
                    }
                    echo('<button class="left" onclick="plus(-1)">&#10094;</button>
                    <button class="right" onclick="plus(1)">&#10095;</button>
                  </section>
                </div>
                <h5 class="article">By '.$author.'   '.$date.'</h5>
                <p>'.$message.'</p>
              </article>
            </main>');
            ?>
            <script src="js/carousel.min.js"></script>
        <?php
          }else{
            echo('
            <main class="article">
              <article class="article">
                <h2 class="artice">'.$title.'</h2>
                <h5 class="article">'.$author.'   '.$date.'</h5>
                <p class="article">'.$message.'</p>
              </article>
            </main>');
          }
        }
      }else{
        header("Location: index.php");
      }
    }
  }else{
    header("Location: index.php");
  }
  require 'footer.php';
?>
