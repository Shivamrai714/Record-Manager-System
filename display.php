<?php 
session_start();

	include("connectionnew.php");
	include("functions.php");

	$user_data = check_login($conn);  
	                                   // defination is given in functions.php to check if user is already logged in ,etc

?>





<html>
<head>
<title>Display record in table</title>	
</head>

<body>

<style type="text/css">
#heading{
	text-align: center;
	text-decoration: underline;
}


</style>
   <h1 id="heading">Records of Patients </h1>
	<br><br>

	<table  border="2">
		<tr>
			<th>NAME</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>TREATMENT</th>
			<th>ADDRESS</th>

		</tr>






<?php

include("connectionnew.php");
// error_reporting(0);


$query="select * from student";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);



// to display individual records
// echo $result['firstname']." ".$result['card']." ".$result['email']." ".$result['gender']." ".$result['country']." ".$result['dob']." ".$result['languages'];

// to display total entries.
// echo $total;
if($total!=0)
	 {
	//  echo "table has records";

while($result=mysqli_fetch_assoc($data))
{
	echo "
 <tr>
 <td>".$result['firstname']."</td>
 <td>".$result['age']."</td>
 <td>".$result['gender']."</td>
 <td>".$result['treatment']."</td>
 <td>".$result['address']."</td>

 
 </tr>
	";
}



	}
else {
	echo "No records";}

?>







</table>
<br>
<br><br>



	<h3 id="heading">This is the Database page</h3>

	<br>
	<h2>Welcome , Mr  <?php echo $user_data['user_name']; ?>
	<br><br><a href="logout.php">Logout</a>
   </h2>





</body>
</html>



