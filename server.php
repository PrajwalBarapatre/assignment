<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'registration');


if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['con_password']);

  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
    
    array_push($errors, "The email you have entered is invalid, please try again.");
}
  if (count($errors) == 0) {
    $password = md5($password_1);
    // $hash = md5(rand(0, 100000));
    // $active = 0;
  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    header('location: index.php');
    // $message = "Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.";
    //   echo "<script type='text/javascript'>alert('$message');</script>";
    //   $_POST = array(); 


    //   $to      = $email; // Send email to our user
    //   $subject = 'Signup | Verification'; // Give the email a subject 
    //   $message = '
      
    //   Thanks for signing up!
    //   Your account has been created, you can login with your credentials after you have activated your account by pressing the url below.
      
      
    //   Please click this link to activate your account:
    //   http://localhost/assignment/verify.php?email='.$email.'&hash='.$hash.'&username='.$username.'
      
      
    //   '; // Our message above including the link
    //   $headers = 'From:prajwalbarapatre13@gmail.com' . "\r\n"; // Set from headers
    //   mail($to, $subject, $message, $headers); // Send our email
                     
// $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
// mail($to, $subject, $message, $headers); // Send our email
  }
}
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  if(isset($_POST['event_reg'])){
    $name = mysqli_real_escape_string($db, $_POST['event_name']);
    $venue = mysqli_real_escape_string($db, $_POST['event_venue']);
    $date = mysqli_real_escape_string($db, $_POST['event_date']);
    $time = mysqli_real_escape_string($db, $_POST['event_time']);
    $desc = mysqli_real_escape_string($db, $_POST['event_desc']);


    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($venue)) { array_push($errors, "Venue is required"); }
    if (empty($date)) { array_push($errors, "Date is required"); }
    if (empty($time)) { array_push($errors, "Time is required"); }
    if (empty($desc)) { array_push($errors, "Description is required"); }


    if (count($errors) == 0) {
      // $password = md5($password_1);
  
      $query = "INSERT INTO events (name, venue, date, time, description) 
            VALUES('$name', '$venue', '$date', '$time', '$desc')";
      mysqli_query($db, $query);
      // $_SESSION['username'] = $username;
      // $_SESSION['success'] = "You are now logged in";
      $message = "Event Name $name, Successfully Registered ";
      echo "<script type='text/javascript'>alert('$message');</script>";
      $_POST = array(); 
    //   echo "<script type='text/javascript'>
    //   setTimeout(function()
    // {
    //     alert('$message');
    // }, 
    // 5000);
    //   </script>";
      
//       $(document).ready(function()
// {
//     setTimeout(function()
//     {
//         alert('msg');
//     }, 
//     5000);
// });
      // header('location: event_reg.php');
    }


  }

  ?>