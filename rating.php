<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	$username="sign up";
	$password="null";
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
  
<div class="container">
  <h3>This is rating Page</h3>
</div>
<!-- /////////////////////////////////////feath user from 1_user table in incresing order of rating and put them in the row of the below table  -->
<table class="table table-bordered">
        <thead>
            <tr>
                <th>rank</td>
                <th width="70%">user</th>
                <th>contest</th>
                <th>rating</th>
            </tr>
        </thead>
        <tbody>			
            <tr>
                <td>1</td>
                <td width="70%"><a href="#" >stream_cipher</a> </th>
                <td>mirzapur</th>
                <td>null</th>
            </tr>
            <tr>
                <td>1</td>
                <td width="70%"><a href="#" >stream_cipher</a> </th>
                <td>null</th>
                <td>null</th>
            </tr>
        </tbody>
        

    </table>
</body>
</html>



