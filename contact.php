<?php
  $title = "Contact Us";
  require "header.php";
?>
<link rel="stylesheet" href="css/form.prefixed.min.css">
<?php
  if(isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
  }else{
    echo('<main class="contact">
    <h1 class="signup">Contact Us</h1>');
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
      }
    }elseif(isset($_GET['submit']) && $_GET['submit'] == "success") {
      echo('<p class="form-error">Submission Successful!</p>');
    }
    echo('
        <form class="form-styled" action="includes/contact.inc.php" method="post">
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
          <select name="subject"');
          if(isset($_GET['subject'])) {
            echo('value='.$_GET['subject'].'>');
          }else{
            echo('>');
          }
    echo('<option value="general">General Inquiry</option>
            <option value="bug">Report a Problem/Bug</option>
            <option value="info-change">Correct/Change Personal Information</option>
          </select>
        </div>
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit" name="contact-submit">Submit</button>
      </form>
    </main>');
  }
?>

<?php
  require "footer.php";
?>
