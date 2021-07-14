<?php
include "dbConnect.php";
function login($username, $passwordss)
{
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM USERS WHERE username = ? and password = ?");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();
$records = $stmt->get_result();
return $records->num_rows === 1;
}

?>



<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>


<?php
   
   $username = $password = " ";
   $usernameErr = $passwordErr= " ";
   $flag = false;
   
   

if($_SERVER['REQUEST_METHOD'] == "POST") 
{

  if(empty($_POST["username"])) 
   {
      $usernameErr = "Field cannot be empty";
      $flag = true;
   }
  if(empty($_POST["password"])) 
   {
      $passwordErr = "Field cannot be empty";
      $flag = true;
   }
 
  
if (empty($_POST["password"])) 
    {  
       $passwordErr = " Password is required";
       $flag = True;  
    } 
 
if(!$flag) 
    {

    $username = input_data($_POST["username"]);
    $password = input_data($_POST["password"]); 
    $res = login($username,$password);
    if($res)
    {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
    }
    else 
    {
    echo  "Login failed";
    }
    }
}
  function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }

 

?>

 

<h2 style="text-align:center">LOGIN</h2>
<fieldset style="text-align:center;">
  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="username">Enter your username:</label> <span style="color:red" >*</span>
<input type="username" id="username" name="username"><span style="color: red"><?php echo $usernameErr; ?></span>
<br></br>
<label for="password">Enter your password:</label> <span style="color:red" >*</span>
<input type="password" id="password" name="password"><span style="color: red"><?php echo $passwordErr; ?></span>
<br></br>
</fieldset>

<br>

<p align="center"><input type="submit" name="Submit" value = "Login"></p>
<p align="right">Do not have an account?<a href="fileio.php">Register here</a></p>

</form>


</body>
  </html>










