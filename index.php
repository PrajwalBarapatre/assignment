<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) {
          unset($_SESSION['success']);
      } 
      
      	
          
          	// // echo $_SESSION['success']; 
          	// unset($_SESSION['success']);
          
      	
      
  	  ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>, Here are your events</p>
        <br>


        <?php 
        $equery = "SELECT * FROM events";
        $db = mysqli_connect('localhost', 'root', '', 'registration');
        $eresult = mysqli_query($db, $equery);
        $events = array();
        if (mysqli_num_rows($eresult)>0){
            while($row = mysqli_fetch_assoc($eresult)){
                $events[] = $row ;
            }
        }
        
        
        ?>
        <?php foreach($events as $event): ?>
        <h2 style="margin-bottom:1px;font-size:44px;"><?php echo $event['name'] ?></h2><br>
        <p style="margin-bottom:1px;font-size:12px;margin-top:1px;"><?php echo $event['date'] ?>, <?php echo $event['time'] ?></p><br>
        <h3 style="margin-bottom:1px;font-size:18px;margin-top:1px;"><?php echo $event['venue'] ?></h3><br>
        <p style="margin-bottom:10px;font-size:22px;margin-top:1px;"><?php echo $event['description'] ?></p><br>
        <?php endforeach ?>

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>