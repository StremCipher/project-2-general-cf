<!-- code improvment **************************************************************************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$ontest]=registration on contest,0=not registerd,1=registred;
 -->
<!DOCTYPE html>
<html lang="en">
<!-- retrive loggedin user data ***********************************************************************************************************************-->
<?php
	session_start();
	// echo($_SESSION["20211"]);
	$username="sign up";
	$login_btn="Login";
	if(isset($_SESSION["username"])){
		$username=$_SESSION["username"];
		$login_btn="Logout";
	}
?>
<head>
	<title>no-name</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

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
<a>to do</a><br>
<a>backend related</a><br>
<a>1-email verification</a><br>
<a><s>2-show previasaly saved option on contest page</s></a><br>
<a>3-next question button on contest page</a><br>
<a>4-connect timer woth database and only allow user to acces the contest page on contest timing</a><br>
<a>5-complete user profile page <s>rating graph</s></a><br>
<a>6-rating change algorithm</a><br>
<a>7-problem page where user can solve particular problme only (layout+design)</a><br>
<a></a><br>
<a>front end related</a><br>
<a></a><br>
<a></a><br>
<a></a><br>
<a></a><br>
<a></a><br>
<a></a><br>
<a></a><br>




</body>
</html>
