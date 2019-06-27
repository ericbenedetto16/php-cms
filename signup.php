<?php
  $title = "Join Us!";
  require "header.php";
?>
<link rel="stylesheet" href="css/form.prefixed.min.css">
<?php
  if(isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
  }else{
    echo('<main class="signup">
    <h1 class="signup">Join Us!</h1>');
    if(isset($_GET['error'])) {
      $error = $_GET['error'];
      if($error == "emptyfields") {
        echo('<p class="form-error">Fill in All Fields!</p>');
      }elseif($error == "invalidnames") {
        echo('<p class="form-error">Invalid First and Last Name!</p>');
      }elseif($error == "invalidfirst") {
        echo('<p class="form-error">Invalid First Name!</p>');
      }elseif($error == "invalidlast") {
        echo('<p class="form-error">Invalid Last Name!</p>');
      }elseif($error == "invalidmail") {
        echo('<p class="form-error">Invalid E-mail!</p>');
      }elseif($error == "invalidaddress") {
        echo('<p class="form-error">Invalid Address Details!</p>');
      }elseif($error == "invalidyear") {
        echo('<p class="form-error">Invalid Year of Graduation!</p>');
      }elseif($error == "sqlerror") {
        echo('<p class="form-error">Internal Error! Contact Technical Support!</p>');
      }elseif($error == "emailexists") {
        echo('<p class="form-error">Email Already In Use!</p>');
      }
    }elseif(isset($_GET['signup']) && $_GET['signup'] == "success") {
      echo('<p class="signupsuccess">Signup successful!</p>');
    }
    echo('<form class="form-styled" action="includes/signup.inc.php" method="post">
        <div class="input-field">
          <input type="text" name="firstname" placeholder="First Name"');
          if(isset($_GET['firstname'])) {
            echo('value='.$_GET['firstname'].'>');
          }else{
            echo('>');
          }
    echo('<input type="text" name="lastname" placeholder="Last Name"');
          if(isset($_GET['lastname'])) {
            echo('value='.$_GET['lastname'].'>');
          }else{
            echo('>');
          }
    echo('</div>
        <div class="input-field">
          <input type="email" name="mail" placeholder="E-mail"');
          if(isset($_GET['mail'])) {
            echo('value='.$_GET['mail'].'>');
          }else{
            echo('>');
          }
    echo('</div>
        <div class="input-field">
          <input type="text" name="address" placeholder="Street Address">
          <input type="text" name="city" placeholder="City">
          <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
          <input type="number" name="zip" placeholder="Zip Code">
        </div>
        <div class="year-submit-field">
          <input type="number" name="year" placeholder="Year of Graduation"');
          if(isset($_GET['year'])) {
            echo('value='.$_GET['year'].'>');
          }else{
            echo('>');
          }
    echo('</div>
          <button type="submit" name="signup-submit">Signup</button>
        </form>
      </main>');
  }
?>

<?php
  require "footer.php";
?>
