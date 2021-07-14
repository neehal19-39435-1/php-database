<?php 
    session_start();

 

    $username = "";

 

    if(isset($_SESSION['username'])) 
    {
        $username = $_SESSION['username'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DATABASE</title>
</head>
<body>
<div style="background-color: pink;width: 100%; height: auto; text-align: center;">
<h1 style="color:white;text-align:center">Hello, <?php echo $username; ?></h1>
</div>
</body>
</html>