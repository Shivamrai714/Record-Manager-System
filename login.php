<?php 

session_start();
  
	include("connectionnew.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: display.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<!-- 
css for from and buttons  -->

	<style type="text/css">
	
	#text{
		height: 35px;
		border-radius: 10px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{
        border-radius: 10px;
		padding: 7px;
		width: 100px;
		color: white;
		background-color: lightseagreen;
		border: none;
	}

	#box{
/*
*/		background-color:orange;
		margin: auto;
		margin-top: 120px;
		width: 300px;
		padding: 20px;
	}
/*Section design */
#home
{  /*position:relative;
   
    height: 400px;  /* to adjust the content below navigation bar*/
    height: 580px;
  display:flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 5px 150px;

}
#home::before
{content:"";
    position:absolute;
    background:url("img/b.jpg")no-repeat center center/cover;    /*to adjust teh img to centre */
top:0;
left:0;               /* to fix the background of home to top and then adjust teh height in bootom*/
       height: 642px;
width:100%;
z-index:-1;
opacity:0.9 ;
}






	</style>

<!-- /////////////////////////////////// -->

<section id="home">




	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white; text-align: center;">Staff Login</div>
<br>
			<input id="text" type="text"placeholder="User Name" name="user_name"><br><br>
			<input id="text" placeholder="Password" type="password" name="password"><br><br>

           <div style="font-size: 20px;margin: 10px;color: white; text-align: center;">
			<input id="button" type="submit" value="Login"><br><br>
			</div>

<!-- // hyper link to the  sign up page -->
         <div style="font-size: 15px;margin: 10px; color: white; text-align: center;">
			<a href="signup.php" >New User:  Click to Register</a><br><br>

             <a href="random.php"> Back to Home </a><br><br>
          </div>
		</form>
	</div>



</section>

</body>

</html>