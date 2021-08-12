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
    // finding contest id by get method ****************************************
    $contest_id = $_GET['contest_id']; 
    if($_SESSION){
        // print_r($_SESSION);
        if(isset($_SESSION["username"])){
            // echo("<script>alert('h1')</script>");
            $username=$_SESSION["username"];
            $login_btn="Logout";
            // echo($contest_id);
            ///////////////////////////////////////////cheack if user already registerd/////////////////////////////////
            $servername = "localhost";
            $server_username = "root";
            $server_password = "";
            $dbname = "general_codeforces";

            // Create connection
            $conn = mysqli_connect($servername, $server_username, $server_password, $dbname);
            $sql = "SELECT participated_contestid FROM $username";
            $result = $conn->query($sql);
            $already_registred=0;
            if($result){
                if(($result->num_rows)> 0){
                    while($row = $result->fetch_assoc()) {
                        // echo "<br> id: ". $row["id"]. " - username= ". $row["username"]. " password= " . $row["password"] . "<br>";
                        if($row["participated_contestid"]==$contest_id){    
                            $already_registred=1;
                            break;
                        }
                    }
                }
            }
            if($already_registred==1){
                echo "<script>alert('already registred')</script>";
                echo "<script>setTimeout(\"location.href = 'all_contest.php';\",500);</script>";
                //////////////////////////////////also add a feature of unregister//////////////////////////////////////////////////////////////////////////
            }
            else {
                /////////////////////////////////////////////////insert null value to user tabel  in data base /////////////////////////////////////////
                    
                $query="insert into $username (participated_contestid,problem_solved,new_rating,rating_change,ranking,_01,_02,_03,_04,_05,_06,_07,_08,_09,_10, _11, _12, _13, _14, _15, _16, _17, _18, _19, _20, _21, _22, _23, _24, _25, _26, _27, _28, _29, _30, _31, _32, _33, _34, _35, _36, _37, _38, _39, _40, _41, _42, _43, _44, _45, _46, _47, _48, _49, _50, _51, _52, _53, _54, _55, _56, _57, _58, _59, _60, _61, _62, _63, _64, _65, _66, _67, _68, _69, _70, _71, _72, _73, _74, _75, _76, _77, _78, _79, _80, _81, _82, _83, _84, _85, _86, _87, _88, _89, _90) values('$contest_id','0','0','0','0','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1','-1' )";
                if(mysqli_query($conn,$query)){
                    $_SESSION[$contest_id]=1;
                    echo "<script>alert('registration completed ')</script>";
                }
                else{
                    echo "<script>alert('registration failed ')</script>";
                    $_SESSION["registration_message"]="registration_failed";
                }
                echo "<script>setTimeout(\"location.href = 'all_contest.php';\",500);</script>";
            }

        }
        else{
            echo "<script>alert('login to access this page')</script>";
		    echo "<script>setTimeout(\"location.href = 'login.php';\",500);</script>";
        }
    }
    else{
        echo "<script>alert('login to access this page')</script>";
		echo "<script>setTimeout(\"location.href = 'login.php';\",500);</script>";
    }

?>

