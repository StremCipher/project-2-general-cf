<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$ontest]=registration on contest,0=not registerd,1=registred;
 -->
<!DOCTYPE html>
<!-- **************************************************** cheaking login status*************************************************** -->
<?php
    session_start();
    if(isset($_SESSION["username"])){
      // cheack more session that has to be clear on user log out *******************************************8
		// unset($_SESSION['username']);
        session_unset();
        session_destroy();
		echo "<script>alert('logged out sucessfully')</script>";
		echo "<script>setTimeout(\"location.href = 'index.php';\",500);</script>";
    }
    else {
		  header("Location:login.php");
    }
?>
