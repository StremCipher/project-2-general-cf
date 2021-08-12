<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$ontest]=registration on contest,0=not registerd,1=registred;
 -->
<!-- ******************************************** cheaking registrasion status **************************************************** -->
<?php
    session_start();
    //********************************************** cheaching if user is logged in or not and setting button accordingally*****************8 */
    $username="sign up";
    $login_btn="Login";
    $status="register";
	if(isset($_SESSION["username"])){
		$username=$_SESSION["username"];
        $login_btn="Logout";
    }
    
?>




<!DOCTYPE html>
<html lang="en">
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
<!-- ***************************************************************************************************************************************-->
<div >
  <h3>This is all contest Page</h3>
</div>
<!-- ****************************************************tabel of upcoming contest ********************************************************* -->

<div>
    <h4>upcoming contest</h4>
</div>
<style>
    .table{
        width:80%;
    }
</style>
<table class="table table-bordered" >
    <thead>
        <tr>
            <th>sr</td>
            <th width="50%">contest_name</th>
            <td width="20%">authers</td>
            <th width="10%">date</th>
            <th width="10%">category</th>
            <th width="10%">registration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td ><a href="contest/contest_20211/problems/p1.php?contest_id=_20211">working_page</a></th>
            <td >null</td>
            <td >mirzapur</th>
            <td >null</th>
            <!-- $contest_id=20211; -->
            <th ><a href="contest_registration.php?contest_id=_20211 "><p id="_20211">register</p></a></th>
        </tr>
        <tr>
            <td>1</td>
            <td ><a href="contest/contest_20212/problems/p1.php?contest_id=_20212">working_page</a></th>
            <td >null</td>
            <td >mirzapur</th>
            <td >null</th>
            <!-- $contest_id=20211; -->
            <th ><a href="contest_registration.php?contest_id=_20212 "><p id="_20212">register</p></a></th>
        </tr>
    </tbody>
</table>
<!-- ******************************************************** tabel of past contest ********************************************************* -->
<div>
    <h4>past contest</h4>
</div>
<table class="table table-bordered">
        <thead>
            <tr>
                <th>sr</td>
                <th width="50%">contest_name</th>
                <td width="20%">authers</td>
                <th width="10%">date</th>
                <th width="10%">category</th>
                <th width="10%">registration</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</html>
<!-- ***************** cheaking if user registerd of upcoming contest *********************************************************************************************** -->
<?php
    if(isset($_SESSION["username"])){
        $upcoming_contest = array("_20211","_20212");
        $servername = "localhost";
        $server_username = "root";
        $server_password = "";
        $dbname = "general_codeforces";
        $conn = mysqli_connect($servername, $server_username, $server_password, $dbname);
        $sql = "SELECT participated_contestid FROM $username";
        $result = $conn->query($sql);
        $n=count($upcoming_contest);
        if($result){
            if(($result->num_rows)> 0){
                while($row = $result->fetch_assoc()) {
                    // echo "<br> id: ". $row["id"]. " - username= ". $row["username"]. " password= " . $row["password"] . "<br>";
                    for($i=0;$i<$n;$i++){
                        if($row["participated_contestid"]==$upcoming_contest[$i]){
                            $index=$upcoming_contest[$i];
                            $_SESSION[$upcoming_contest[$i]]=1;
                            echo("<script>$('#$index').text('registerd');</script>");
                            echo("<script>$('#$index').css('color','green');</script>");
                        }
                    }
                }
            }
        }
    }
?>
