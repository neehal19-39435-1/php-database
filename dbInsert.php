
<?php
    include 'dbConnect.php';

 
function login($username, $password)
{
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM USERS WHERE username = ? and password = ?");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();
$records = $stmt->get_result();
return $records->num_rows === 1;
}

    function signup($fname, $lname, $gender, $dob, $religion, $praddress, $peaddress,  $phone, $email, $web, $username, $password)
    {
     $conn = connect();
     $stmt = $conn->prepare("INSERT INTO USERS (fname, lname, gender, dob, religion, praddress, peaddress, phone, email, web, username, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
     $stmt->bind_param("ssssssssssss",$fname, $lname, $gender, $dob, $religion, $praddress, $peaddress, $phone, $email, $web, $username, $password);
     return $stmt->execute();
    } 
?>
