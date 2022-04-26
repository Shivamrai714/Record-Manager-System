<?php
if(!empty($_POST['submit']))
{


$fn=        $_POST['firstname'];
$em=        $_POST['treatment'];    //treatment
$age=        $_POST['age'];
$pwd=       $_POST['mobilenumber'];  //password
$conpwd=    $_POST['address'];       //confirmpassword

require("fpdf/fpdf.php");          //location of fpdf file

$pdf= new FPDF();
$pdf->AddPage();

$pdf->SetFont("Arial","",12);
$pdf->Cell(0,10,"Registration Successful ",1,1,'C');
$pdf->Cell(0,10,"Patient's Detail",1,1,'C');

$pdf->Cell(35,10,"Name",1,0);
$pdf->Cell(13,10,"Age",1,0);
$pdf->Cell(40,10,"Treatment ",1,0);
$pdf->Cell(35,10,"Moblie",1,0);
$pdf->Cell(0,10,"Address",1,1);


$pdf->Cell(35,10,$fn,1,0);
$pdf->Cell(13,10,$age,1,0);
$pdf->Cell(40,10,$em,1,0);
$pdf->Cell(35,10,$pwd,1,0);
$pdf->Cell(0,10,$conpwd,1,0);



$file=time().'.pdf';
$pdf->output($file,'D');

 $pdf->output();

}

?>