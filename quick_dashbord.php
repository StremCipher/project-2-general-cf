<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!DOCTYPE html>

<html lang="en">

<!-- retrive loggedin user data //////////////////////////////////////////////////////////////////////////-->

<?php
    session_start();
    if(isset($_SESSION["who"])){
        if($_SESSION["who"]==$user){
            ;
        }
        else{
        }
    }
    else{
        echo "<script>alert('Please register in contest first')</script>";
        echo "<script>setTimeout(\"location.href = 'all_contest.php';\",500);</script>";
    }
    $username=$_SESSION["username"];
    // $password=$_SESSION["password"];
    $login_btn="Logout";
    $row_id=$_SESSION["row_id"];
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
<h3>this is quick dashbord page</h3>
</div>
<?php
if(isset($_SESSION["who"])){
    if($_SESSION["who"]==$user){
        $con=mysqli_connect('localhost','root');
        mysqli_select_db($con,'general_codeforces');
        $sql = "SELECT * FROM $username WHERE id =$row_id;";
        $result = $con->query($sql);
        $user = mysqli_fetch_assoc($result);
        $question_ids=array("_01","_02","_03","_04","_05","_06","_07","_08","_09","_10","_11","_12","_13","_14","_15","_16","_17","_18","_19","_20","_21","_22","_23","_24","_25","_26","_27","_28","_29","_30","_31","_32","_33","_34","_35","_36","_37","_38","_39","_40","_41","_42","_43","_44","_45","_46","_47","_48","_49","_50","_51","_52","_53","_54","_55","_56","_57","_58","_59","_60","_61","_62","_63","_64","_65","_66","_67","_68","_69","_70","_71","_72","_73","_74","_75","_76","_77","_78","_79","_80","_81","_82","_83","_84","_85","_86","_87","_88","_89","_90");
        $answerdwithoption1=1;
        $answerdwithoption2=2;
        $answerdwithoption3=3;
        $answerdwithoption4=4;
        // print_r($user['participated_contestid']);
        // echo("<script > change()</script>");
        for($i=0;$i<90;$i++){
            echo(".................................question=");echo($i+1);echo("..............selcted option=");echo($user[$question_ids[$i]]);
            echo nl2br("\n");
        }
        //////////////////////////////////////////////////////////update problem solve ,new rating ect in database  ////////////////////////////
    }
}
?>

</body>
</html>
