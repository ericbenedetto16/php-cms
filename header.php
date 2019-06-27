<?php
  if(!isset($_SESSION)) {
    session_start();
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Port Richmond High School Alumni Website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <?php
      if(!isset($title)) {
        $title = "Port Richmond Alumni Association";
      }
      echo('<title>'.$title.'</title>');
    ?>
    <?php
      $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
      $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
      $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
      $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
      $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
      if($iPod || $iPhone || $iPad || $Android || $webOS) {
        echo('<link rel="stylesheet" href="css/header.m.prefixed.min.css">');
        echo('<link rel="stylesheet" href="css/master.m.prefixed.min.css">');
        echo('<script src="js/mobile-dropdown.min.js"></script>');

      }else{
        echo('<link rel="stylesheet" href="css/header.css">');
        echo('<link rel="stylesheet" href="css/master.css">');
      }
    ?>
  </head>
  <body>
    <header>
      <a class="header-logo" href="index.php">
        <img src="img/logo.png" alt="Logo">
      </a>
      <div class="nav-wrapper">
        <div class="btn-toggle-nav" onclick="toggleNav()">
          <div class="btn-toggle-nav-img">
          </div>
        </div>
        <nav class="nav-header-main">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="trigger-dropdown unselected"><a href="#">About Us</a>
              <ul class="dropdown-menu">
                <li><a href="ourmission.php">Our Mission</a></li>
                <li><a href="whatwedone.php">What We've Done</a></li>
              </ul>
            </li>
            <li class="trigger-dropdown unselected"><a href="#">What's New</a>
              <ul class="dropdown-menu">
                <li><a href="events.php">Events & Articles</a></li>
                <li><a href="newsletters.php">Newsletter Archives</a></li>
              </ul>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
            <li class="hidden"><a href="signup.php"><button type="submit" name="join-us"></button>Join Us</a></li>
            <li class="button hidden"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="7HFWZJMBKC34N">
              <button class="paypal-button" type="submit" name="donate">Donate</button>
            </form></li>
          </ul>
        </nav>
      </div>
      <?php
        if(isset($_SESSION['userId'])) {
          echo('<div class="button-holder">
          <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
          </form>
          </div>');
        }else{
          echo('<div class="button-holder">
            <a href="signup.php"><button type="submit" name="join-us">Join Us</button></a>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="7HFWZJMBKC34N">
              <button class="paypal-button" type="submit" name="donate">Donate</button>
            </form>
          </div>');
        }
      ?>
    </header>
    <aside class="nav-header-mobile">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><span>About Us</span>
          <ul>
            <li><a href="ourmission.php">Our Mission</a></li>
            <li><a href="whatwedone.php">What We've Done</a></li>
          </ul>
        </li>
        <li><span>What's New</span>
          <ul>
            <li><a href="events.php">Events & Articles</a></li>
            <li><a href="newsletters.php">Newsletter Archives</a></li>
          </ul>
        </li>
        <li><a href="contact.php">Contact Us</a></li>
        <li class="hidden"><a href="signup.php">Join Us</a></li>
        <li class="button hidden"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="7HFWZJMBKC34N">
          <button class="paypal-button" type="submit" name="donate">Donate / Pay Dues</button>
        </form></li>
      </ul>
    </aside>
