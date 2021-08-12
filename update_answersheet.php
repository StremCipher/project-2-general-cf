
<?php
    session_start();
    // echo("SDAS");
    $selected_option=$_GET['selected_option'];
    $selected_question=$_SESSION['selected_question'];
    $contest_id = $_SESSION['contest_id'];
    if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];

        $servername = "localhost";
        $server_username = "root";
        $server_password = "";
        $dbname = "general_codeforces";

        // Create connection
        $conn = mysqli_connect($servername, $server_username, $server_password, $dbname);   
        $query="UPDATE $username SET $selected_question='$selected_option' WHERE participated_contestid='$contest_id'";
        mysqli_query($conn,$query);
    }

?>