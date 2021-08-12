<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$ontest]=registration on contest,0=not registerd,1=registred;
 -->
<!DOCTYPE html>
<html lang="en">
	<!-- <style>
		.chartdiv{
			margin:0px 100px 0px 100px;
			height:300px;
			width:auto;
	}
	</style> -->
<?php
    session_start();
    $username="sign up";
    $password="null";
    $login_btn="Login";
    if(isset($_SESSION["username"])){
		$username=$_SESSION["username"];
		$login_btn="Logout";
	}
	else{
		header("Location:register.php");
	}
?>

<head>
	<title>no-name</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="chartjs.js"></script>
	<link rel="stylesheet" href="profile-style.css">
</head>

<body>

	<nav class="nav-bar">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">no-name</a>
				</div>
				<ul class="nav navbar-nav" id="menu">
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
				<img src="toggel-btn.png" class="toggel-btn-img" onclick="toggel-menu()" >
			</div>
		</nav>
		
	<?php
		// session_start();
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'general_codeforces');
		$sql = "SELECT * FROM 1_user WHERE username='$username'";
		$result = $con->query($sql);
		$user = mysqli_fetch_assoc($result);
		echo("username="); echo($user['username']);echo nl2br("\n");
		echo("email="); echo($user['email']);echo nl2br("\n");
		echo("password="); echo($user['password']);echo nl2br("\n");
		echo("email verification status="); echo($user['email_verified']);
	?>
	
	<div >
		<h3>This profile Page</h3>
	</div>
	
	<script>
		function myFunction(a,b,c,d,e) {
			var table = document.getElementById("myTable");
			var row = table.insertRow(1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			cell1.innerHTML = a;
			cell2.innerHTML = b;
			cell3.innerHTML = c;
			cell4.innerHTML = d;
			cell5.innerHTML = e;
		}
	</script>
	<div class="chartdiv">
		<canvas id="myChart" ></canvas>
	</div>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				datasets: [{
					label: 'user performance chart',
					data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3],
					lineTension: 0,
					borderWidth:2.5,
					fill:false,
					borderColor:'rgba(233, 196, 66, 0.9)',
					// pointStyle:'',
					pointBorderColor:'rgba(0, 0, 0, 0.9)',
					// maintainAspectRatio: false,
				}]
			},
			options: {
				maintainAspectRatio: false,
				responsive: true,
				legend: {
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
	<h2>contest history</h2><br>
	<div class="table-responsive">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr >
					<th width="50%" >contest_name</th>
					<td width="10%">proble	m solved</td>
					<td width="10%">new rating</td>
					<td width="10%">rating change</td>
					<td width="10%">rank</td>
					<!-- <td width="10%">email_verified</td> -->
				</tr>
			</thead>
		</table>
	</div>
	<br>
	<script>
		var 
	</script>
	
</body>
</html>
	<?php
	// session_start();
	$con=mysqli_connect('localhost','root');
	if($con)
		;	
	else
		echo "failed to connect to database";
	mysqli_select_db($con,'general_codeforces');
	$username=$_SESSION['username'];
	$sql = "SELECT participated_contestid,problem_solved,new_rating,rating_change,ranking FROM $username";
	$result = $con->query($sql); 

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$a=$row["participated_contestid"];
			$b=$row["problem_solved"];
			$c=$row["new_rating"];
			$d=$row["rating_change"];
			$e=$row["ranking"];
			echo("<script >myFunction('$a','$b','$c','$d','$e')</script>");
		}
	}
	$con->close();
?>



























