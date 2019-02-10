<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['con_password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
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
      // $password = md5($password_1);//encrypt the password before saving in the database
  
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