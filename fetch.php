<?php

require('fpdf.php');

$emailinp=$_POST["email"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iwtexp9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `fname`, `mname`, `lname`, `dob`, `gender`, `blood`, `phone`, `cemail`, `pemail`, `addr`, `sslc`, 
`hsc`, `cgpa`, `arrear`, `fathername`, `mothername`, `fatherphone`, `motherphone`, `profileimage` FROM `data` WHERE `cemail`='$emailinp'";

$result = $conn->query($sql);

ob_start();
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $bldgroup = $row['bldgroup'];
    $phone = $row['phone'];
    $cemail = $row['cemail'];
    $pemail = $row['pemail'];
    $addr = $row['addr'];
    $sslc = $row['sslc'];
    $hsc = $row['hsc'];
    $cgpa = $row['cgpa'];
    $backlog = $row['backlog'];
    $fathername = $row['fathername'];
    $mothername = $row['mothername'];
    $fphone = $row['fphone'];
    $mphone = $row['mphone'];
}


$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Write title
$pdf->Cell(0, 10, 'Student Information', 0, 1, 'C');

// Write personal information
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 7, 'Name:', 0);
$pdf->Cell(0, 7, $fname.' '.$mname.' '.$lname, 0, 1);
$pdf->Cell(50, 7, 'Date of Birth:', 0);
$pdf->Cell(0, 7, $dob, 0, 1);
$pdf->Cell(50, 7, 'Gender:', 0);
$pdf->Cell(0, 7, $gender, 0, 1);
$pdf->Cell(50, 7, 'Blood Group:', 0);
$pdf->Cell(0, 7, $bldgroup, 0, 1);
$pdf->Cell(50, 7, 'Phone Number:', 0);
$pdf->Cell(0, 7, $phone, 0, 1);
$pdf->Cell(50, 7, 'Current Email:', 0);
$pdf->Cell(0, 7, $cemail, 0, 1);
$pdf->Cell(50, 7, 'Permanent Email:', 0);
$pdf->Cell(0, 7, $pemail, 0, 1);
$pdf->Cell(50, 7, 'Address:', 0);
$pdf->Cell(0, 7, $addr, 0, 1);

// Write academic information
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'Academic Information', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 7, 'SSLC:', 0);
$pdf->Cell(0, 7, $sslc, 0, 1);
$pdf->Cell(50, 7, 'HSC:', 0);
$pdf->Cell(0, 7, $hsc, 0, 1);
$pdf->Cell(50, 7, 'CGPA:', 0);
$pdf->Cell(0, 7, $cgpa, 0, 1);
$pdf->Cell(50, 7, 'Backlogs:', 0);
$pdf->Cell(0, 7, $backlog, 0, 1);

// Write parental information
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'Parental Information', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 7, 'Father\'s Name:', 0);
$pdf->Cell(0, 7, $fathername, 0, 1);
$pdf->Cell(50, 7, 'Mother\'s Name:', 0);
$pdf->Cell(0, 7, $mothername, 0, 1);
$pdf->Cell(50, 7, 'Father\'s Phone Number:', 0);
$pdf->Cell(0, 7, $fphone, 0, 1);
$pdf->Cell(50, 7, 'Mother\'s Phone Number:', 0);
$pdf->Cell(0, 7, $mphone, 0, 1);
ob_end_clean();

$pdf->Output();
}

?>