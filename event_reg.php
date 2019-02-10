<?php include("server.php") ?>
<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Event Registration</title>

    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/login.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h4>Event Form</h4>
      <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
    </div>

    <!-- Login Form -->
    <form method="POST" action="event_reg.php" id="event_form">
      <?php include("errors.php") ?>
      <input type="text" id="event_name" class="fadeIn second" name="event_name" placeholder="Name"  >
      <textarea name="event_desc" form="event_form" placeholder="Description"></textarea>
      <input type="text" id="event_venue" class="fadeIn second" name="event_venue" placeholder="Venue"  >
      <input type="date" id="event_date" class="fadeIn second" name="event_date" placeholder="Date" >
      <input type="time" id="event_time" class="fadeIn second" name="event_time" placeholder="Time" >
      <br>
      
      <input type="submit" class="fadeIn fourth" value="Submit" name="event_reg">
    </form>
    <!-- <textarea name="event_desc" form="event_form" placeholder="Descriprtion"></textarea> -->

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>
    <div id="formFooter"> -->
      <!-- <p>
        Already a member ?
      </p>
        <a class="underlineHover" href="login.php">Log In</a>
       -->
      </div>

  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>