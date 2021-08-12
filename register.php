<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$ontest]=registration on contest,0=not registerd,1=registred;
 -->
<?php
	session_start();
	$username="sign up";
	$login_btn="Login";
	if(isset($_SESSION["username"])){
		$username=$_SESSION["username"];
		$login_btn="Logout";
	}
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$con=mysqli_connect('localhost','root');
		if(!$con)
			echo "failed to connect to database";
		mysqli_select_db($con,'general_codeforces');
		$username=$_POST['Username'];
		$password=$_POST['Password'];
		$repassword=$_POST['RePassword'];
		$email=$_POST['Email'];
		$rating=0;
		$contest=0;
		$query="insert into 1_user(username,email,password,rating,contest,email_verified) values('$username','$email','$password','$rating','$contest','0')";
		$ok=true;
		if($password!=$repassword)
			$ok=false;
		$sql = "SELECT id,username, password FROM 1_user";
		$result = $con->query($sql);
		// ****************************************** cheacking for if user alredy exist **************************************************************
		if(($result->num_rows)> 0){
			while($row = $result->fetch_assoc()) {
				// echo "<br> id: ". $row["id"]. " - username= ". $row["username"]. " password= " . $row["password"] . "<br>";
				if($row["username"]==$username){    
					$ok=false;
					break;
				}
			}
		}
		// echo($ok);
		if($ok==true){
			$servername = "localhost";
			$server_username = "root";
			$server_password = "";
			$dbname = "general_codeforces";

			// Create connection
			$conn = mysqli_connect($servername, $server_username, $server_password, $dbname);
			$sql = "CREATE TABLE $username (
			id INT(6) AUTO_INCREMENT PRIMARY KEY,
			participated_contestid varchar(255),
			problem_solved INT(6),
			new_rating INT(6),
			rating_change INT(6),
			ranking INT(6),
			_01 INT(6),_02 INT(6),_03 INT(6),_04 INT(6),_05 INT(6),_06 INT(6),_07 INT(6),_08 INT(6),_09 INT(6),_10 INT(6),_11 INT(6),
			_12 INT(6),_13 INT(6),_14 INT(6),_15 INT(6),_16 INT(6),_17 INT(6),_18 INT(6),_19 INT(6),_20 INT(6),_21 INT(6),_22 INT(6),_23 INT(6),
			_24 INT(6),_25 INT(6),_26 INT(6),_27 INT(6),_28 INT(6),_29 INT(6),_30 INT(6),_31 INT(6),_32 INT(6),_33 INT(6),_34 INT(6),
			_35 INT(6),_36 INT(6),_37 INT(6),_38 INT(6),_39 INT(6),_40 INT(6),_41 INT(6),_42 INT(6),_43 INT(6),_44 INT(6),_45 INT(6),
			_46 INT(6),_47 INT(6),_48 INT(6),_49 INT(6),_50 INT(6),_51 INT(6),_52 INT(6),_53 INT(6),_54 INT(6),_55 INT(6),_56 INT(6),
			_57 INT(6),_58 INT(6),_59 INT(6),_60 INT(6),_61 INT(6),_62 INT(6),_63 INT(6),_64 INT(6),_65 INT(6),_66 INT(6),_67 INT(6),
			_68 INT(6),_69 INT(6),_70 INT(6),_71 INT(6),_72 INT(6),_73 INT(6),_74 INT(6),_75 INT(6),_76 INT(6),_77 INT(6),_78 INT(6),
			_79 INT(6),_80 INT(6),_81 INT(6),_82 INT(6),_83 INT(6),_84 INT(6),_85 INT(6),_86 INT(6),_87 INT(6),_88 INT(6),_89 INT(6),_90 INT(6)
			)";
			// *********************************************** cheack if password is atleast 8 character long *******************************************
			if(strlen($password)<8){
				$username="sign in";
				echo("<script>alert('password must be atleast 8 chracter long ')</script>");
			}
			else{
				// email verification *******************************************************************************************************************
				if(mysqli_query($conn,$sql)){
					mysqli_query($con,$query);
					$_SESSION["username"]=$username;
					$_SESSION["password"]=$password;
					echo("<script>alert('account created')</script>");
					echo "<script>setTimeout(\"location.href = 'index.php';\",1);</script>";
				}
				else{
					$username="sign in";
					echo("<script>alert('registration failed')</script>");
				}
			}
		}
		else{
			if($password!=$repassword){
				echo("<script>alert('password not matches')</script>");
			} 
			else{
				echo("<script>alert('username alredy taken')</script>");
			}
		}
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
		<form action="register.php" method="POST">
			<label><b>Register To No-Name</b></label>  
			<hr class="first">
			<label><b>Username</b></label>    
			<input type="text" name="Username" placeholder="Username" required id="Username">    
			<br><br>    
			<label><b>Email</b>    </label>    
			<input type="email" name="Email" placeholder="Email" required id="Email">    
			<br><br>    
			<label><b>Password     </b>    </label>    
			<input type="Password" name="Password"  placeholder="Password" required id="Password">       
			<br><br>    
			<label><b>RePassword     </b>    </label>    
			<input type="Password" name="RePassword"  placeholder=" Re Type Password" required id="Repassword">    
			<br><br>   
			<button type="submit" name="login" value="login">create account</button> 
			<br><br>    
	</div>

</body>
</html>
