<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwtexp9";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$bldgroup = $_POST['bldgroup'];
$phone = $_POST['phone'];
$cemail = $_POST['cemail'];
$pemail = $_POST['pemail'];
$addr = $_POST['addr'];
$sslc = $_POST['sslc'];
$hsc = $_POST['hsc'];
$cgpa = $_POST['cgpa'];
$backlog = $_POST['backlog'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$fphone = $_POST['fphone'];
$mphone = $_POST['mphone'];
$profimage = $_FILES['profimage']['name']; 

$sql ="INSERT INTO `data`(`fname`, `mname`, `lname`, `dob`, `gender`, `blood`, `phone`, `cemail`, `pemail`, `addr`, `sslc`, `hsc`, `cgpa`, `arrear`, `fathername`, `mothername`, `fatherphone`, `motherphone`, `profileimage`)
 VALUES ('$fname', '$mname', '$lname', '$dob', '$gender', '$bldgroup', '$phone', '$cemail', '$pemail', '$addr', '$sslc', '$hsc', '$cgpa', '$backlog', '$fathername', '$mothername', '$fphone', '$mphone','$profimage')" ;


if($conn->query($sql)==TRUE)
{
  echo "Inserted Successfully";
  header("Location: index.html");
  exit();
}
else
{
  echo "<script>alert('Insertion Failed.')</script>";
}

?>
