<?php
  $title = "Join Us!";
  require "header.php";
?>
<link rel="stylesheet" href="css/signup-form.css">
<?php
  if(isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
  }else{
    echo('<main class="signup">
    <h1 class="signup">Join Us!</h1>');
    if(isset($_GET['error'])) {
      if($_GET['error'] == "emptyfields") {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['mail'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Fill in All Fields!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$firstname.'>
            <input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'>
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "invalidnames") {
        $email = $_GET['mail'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Invalid First and Last Name!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "invalidfirst") {
        $lastname = $_GET['lastname'];
        $email = $_GET['mail'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Invalid First Name!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'>
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "invalidlast") {
        $firstname = $_GET['firstname'];
        $email = $_GET['mail'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Invalid Last Name!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$firstname.'>
            <input type="text" name="lastname" placeholder="Last Name">
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "invalidmail") {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Invalid E-mail!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$firstname.'>
            <input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'>
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail">
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "invalidaddress") {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['mail'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Invalid Address Details!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$firstname.'>
            <input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'>
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "invalidyear") {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['mail'];
        echo('<p class="signuperror">Invalid Year of Graduation!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post" value='.$firstname.'>
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$lastname.'>
            <input type="text" name="lastname" placeholder="Last Name">
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation">
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "sqlerror") {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['mail'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Internal Error! Contact Technical Support!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$firstname.'>
            <input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'>
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail" value='.$email.'>
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }elseif($_GET['error'] == "emailexists") {
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $year = $_GET['year'];
        echo('<p class="signuperror">Email Already In Use!</p>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="name-field">
            <input type="text" name="firstname" placeholder="First Name" value='.$firstname.'>
            <input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'>
          </div>
          <div class="mail-field">
            <input type="email" name="mail" placeholder="E-mail">
          </div>
          <div class="address-field">
            <input type="text" name="address" placeholder="Street Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
            <input type="number" name="zip" placeholder="Zip Code">
          </div>
          <div class="year-submit-field">
            <input type="number" name="year" placeholder="Year of Graduation" value='.$year.'>
          </div>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </main>');
      }
    }elseif(isset($_GET['signup']) && $_GET['signup'] == "success") {
      echo('<p class="signupsuccess">Signup successful!</p>
        <form class="form-signup" action="includes/signup.inc.php" method="post">
        <div class="name-field">
          <input type="text" name="firstname" placeholder="First Name">
          <input type="text" name="lastname" placeholder="Last Name">
        </div>
        <div class="mail-field">
          <input type="email" name="mail" placeholder="E-mail">
        </div>
        <div class="address-field">
          <input type="text" name="address" placeholder="Street Address">
          <input type="text" name="city" placeholder="City">
          <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
          <input type="number" name="zip" placeholder="Zip Code">
        </div>
        <div class="year-submit-field">
          <input type="number" name="year" placeholder="Year of Graduation">
        </div>
          <button type="submit" name="signup-submit">Signup</button>
        </form>
      </main>');
    }else{
      echo('<form class="form-signup" action="includes/signup.inc.php" method="post">
        <form class="form-signup" action="includes/signup.inc.php" method="post">
        <div class="name-field">
          <input type="text" name="firstname" placeholder="First Name">
          <input type="text" name="lastname" placeholder="Last Name">
        </div>
        <div class="mail-field">
          <input type="email" name="mail" placeholder="E-mail">
        </div>
        <div class="address-field">
          <input type="text" name="address" placeholder="Street Address">
          <input type="text" name="city" placeholder="City">
          <input type="text" name="state" placeholder="State" minlength="2" maxlength="2">
          <input type="number" name="zip" placeholder="Zip Code">
        </div>
        <div class="year-submit-field">
          <input type="number" name="year" placeholder="Year of Graduation">
        </div>
          <button type="submit" name="signup-submit">Signup</button>
        </form>
      </main>');
    }
  }
?>

<?php
  require "footer.php";
?>
