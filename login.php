<!-- **********************  code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$contest]=registration on contest,0=not registerd,1=registred;
 -->

<?php
	session_start();
	$username="sign up";
	$login_btn="Login";
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$con=mysqli_connect('localhost','root');
		if($con)
			;
		else
			echo "failed to connect to database";
		mysqli_select_db($con,'general_codeforces');
		$username=$_POST['Username'];
		$password=$_POST['Password'];

		$sql = "SELECT id,username, password FROM 1_user";
		$result = $con->query($sql); 

		if ($result->num_rows > 0) {
			$fnd=0;
			while($row = $result->fetch_assoc()) {
				// echo "<br> id: ". $row["id"]. " - username= ". $row["username"]. " password= " . $row["password"] . "<br>";
				if($row["username"]==$username and $row["password"]==$password){    
					$_SESSION["username"] = $username;
					$fnd=1;
					echo "logged in succesfully... redirecting to home page";
        			echo "<script>setTimeout(\"location.href = 'index.php';\",3000);</script>";
				}
			}
			if($fnd==0)
				echo("<script>alert('username password not matches')</script>");

		}
		else {
			echo("<script>alert('username password not matches')</script>");
		}
		$con->close();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		hr.first{
			border: 1px solid black;
		}
		.form{
			border: 1px solid black;
			position: absolute;
			margin-top:-50px;
			margin-left:-100px;
			top:40%;
			left:45%;
			padding: 20px;
		}
	</style>
	<title>no-name</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand" href="index.php">no-name</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="rating.php">Ranking</a></li>
				<li><a href="all_contest.php">Contest</a></li>
				<li><a href="problemset.php">Problemset</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="help.php">Help</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username?></a></li>
				<li><a href="login_logout.php"><span class="glyphicon glyphicon-log-out"></span> <?php echo $login_btn?></a></li>
			</ul>
		</div>
	</nav>
</head>
<body>
	<div class="form">    
		<form action="login.php" method="POST">
			<label><b>Login To No-Name</b></label>  
			<hr class="first">
			<label><b>Username</b></label>    
			<input type="text" name="Username" placeholder="Username" required id="username">    
			<br><br>    
			<label><b>Password     </b>    </label>    
			<input type="Password" name="Password"  placeholder="Password" required id="password">       
			<br><br>    
			<button type="submit" name="login" value="login">Log In</button>      
			<a href="register.php">Create Account</a> 
		</form>     
	</div>    

</body>
</html>
