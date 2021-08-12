<!-- code improvment ******************************************************************************
    1-done 11-1-2021; 
-->
<!-- 
    session variable
    1-$_SESSION["USERNAME"]=username;
    2-$_SESSION[$contest]=registration on contest,0=not registerd,1=registred;
    3-$_SEESION["selected_question"]=id 0f selected question
 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
    session_start();
    $username="not loggedin";
    $login_btn="login";
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $_SESSION["selected_question"]="_30";
    $question_number=30;
    if($_SESSION){
        if(isset($_SESSION["username"])){
            $username=$_SESSION["username"];
            $login_btn="Logout";
        }
        else{
            echo "<script>alert('login to access this page')</script>";
            echo "<script>setTimeout(\"location.href = '/projects/general cf/login.php';\",1);</script>";
        }
    }
    else{
        echo "<script>alert('login to access this page')</script>";
        echo "<script>setTimeout(\"location.href = '/projects/general cf/login.php';\",1);</script>";
    }
    // ******************************************* mark current question as visited *************************************************
    $selected_option=0;
    $selected_question=$_SESSION['selected_question'];
    $contest_id = $_GET['contest_id'];
    if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];

        $servername = "localhost";
        $server_username = "root";
        $server_password = "";
        $dbname = "general_codeforces";

        // Create connection
        $conn = mysqli_connect($servername, $server_username, $server_password, $dbname);   
        $query="UPDATE $username SET $selected_question='$selected_option' WHERE participated_contestid='$contest_id'";
        $query1="SELECT  $selected_question FROM $username WHERE participated_contestid='$contest_id'";
        $option=mysqli_query($conn,$query1);
        $user = mysqli_fetch_assoc($option);
        // print_r($user[$selected_question]);//selected option
        // making current question visited if it is not answerd priviosly;
        if($user){
            if($user[$selected_question]==-1)
                (mysqli_query($conn,$query));
        }
    }
    // ****************************************************** cheaking if registered for contest or not ******************************************************
    $registeredforcontest=0;
    if(isset($_SESSION["_20211"])){
        if($_SESSION["_20211"]==1)
            $registeredforcontest=1;
    }
    // echo($registeredforcontest);

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <style type="text/css">
        .navbar_top{
            background-color:rgb(217, 245, 153);;
            text-align: center;
            border:0.5px solid black;
            height: 55px;
        }
        .topbar{
            background-color:red;
            text-align: center;
            width: 100%;
        }
        .navbar{
            background-color:rgb(217, 245, 153);
            border: 2px solid black;
            border-radius:20px;
        }
        .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        }
        .left{
            width: 80%;
            height: 700px;
            /* border: 0.5px solid black; */
            float: left;
            padding: 1% 5% 0% 5%;
        }
        .right{
            width: 20%;
            height: 700px;
            /* border: 0.5px solid black; */
            float: left;
        }
        .answersheet{
            width: 100%;
            height: 700px;
            border:0.5px solid black;
            position: fixed;
            border-radius:5px;
        }
        .paragraph{
            display: hidden;
        }
    </style>




 




  <title>no-name</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="response.js"></script>
  
<div class="navbar_top">
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/projects/general cf/index.php">no-name</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/projects/general cf/index.php">Home</a></li>
                <li><a href="/projects/general cf/rating.php">Ranking</a></li>
                <li><a href="/projects/general cf/all_contest.php">Contest</a></li>
                <li><a href="/projects/general cf/problemset.php">Problemset</a></li>
                <li><a href="/projects/general cf/about.php">About</a></li>
                <li><a href="/projects/general cf/help.php">Help</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/projects/general cf/profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username?></a></li>
                <li><a href="/projects/general cf/login_logout.php"><span class="glyphicon glyphicon-log-out"></span> <?php echo $login_btn?></a></li>
            </ul>
        </div>
    </nav>
  </div>
</head>
<body>
    <div >
        <div class="left">
            <p >
                <h4><b>Question No.<?php echo($question_number)?></b></h4><br>
                <!-- question statement -->
                    Scroll Down
                    Scroll down to see the sticky effect.
                    HomeNewsContact
                    Sticky Navigation Example
                    The navbar will stick to the top when you reach its scroll position.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling..  ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Scroll Down
                    Scroll down to see the sticky effect.
                    HomeNewsContact
                    Sticky Navigation Example
                    The navbar will stick to the top when you reach its scroll position.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.
                    HomeNewsContact
                    <br><br>




                    <!-- java script code to save selcted option -->
                    <script>
                        var val;
                        function save_response(form, name) {
                            var rgforcontest="<?php echo($registeredforcontest)?>";
                            if(rgforcontest==0){
                                alert("you are not registred for contest");
                                // window.location.replace('/projects/general cf/all_contest.php');
                            }
                            else{
                                var radios = form.elements[name];
                                for (var i=0, len=radios.length; i<len; i++) {
                                    if ( radios[i].checked ) {
                                        val = radios[i].value; 
                                        alert(val+"  is saved");
                                    ////////////////////////////////////////////// add this option to user answer sheet in database//////////////
                                    var new_val=i+1;
                                    // alert(new_val);
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            // alert(this.responseText)
                                        }
                                    };
                                    xmlhttp.open("GET","/projects/general cf/update_answersheet.php?selected_option="+new_val,true);
                                    xmlhttp.send();
                                    // alert("FASFAS");
                                    return; 
                                }
                            }
                            alert("no option is chosen");
                        }
                    }
                        function clear_response() {
                            var rgforcontest="<?php echo($registeredforcontest)?>";
                            if(rgforcontest==0){
                                alert("you are not registred for contest");
                                // window.location.replace('/projects/general cf/all_contest.php');
                            }
                            else{
                                $( "input[name='option']" ).prop({checked: false});

                                ////////////////////////////////////////////// clear from in database//////////////////////////////////////////
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        // alert(this.responseText)
                                    }
                                };
                                xmlhttp.open("GET","/projects/general cf/update_answersheet.php?selected_option="+0,true);
                                xmlhttp.send();
                                return; 
                            }
                        }
                </script>
                <!-- options for sigle correct answer-->

                <!-- add feature that show saved option after page reload -->
                <form id="form">
                    <label><input type="radio" name="option" value="option_1"><b>option 1</b></label>
                    <label><input type="radio" name="option" value="option_2"><b>option 2</b></label>
                    <label><input type="radio" name="option" value="option_3"><b>option 3</b></label>
                    <label><input type="radio" name="option" value="option_4"><b>option 4</b></label>
                </form>
                <button><a href="#">next question</a></button>
                <button style="color:green" onclick="save_response(document.getElementById('form'),'option')" >save response</button>
                <button  onclick="clear_response()" >clear response</button>
                <!-- option for multiple correct answer -->

            </p>

        </div>









        <div class="right">
            <div class="answersheet" id="answersheet_div">
                <table>
                    <style>
                        button{
                            color:red;
                            /* height: 30px;
                            width: 30px; */
                            float: right;
                            border-radius:10px;

                             /*background-color:white;*/
                             /*color:black;*/
                        }
                        a{
                            color: black;
                        }
                    </style>
                    <b id="here"></b>
                    <!-- <button>submit</button> -->
                    <!-- counter timer code in java script -->
                    <script src=timer.js></script>
                    <tr>
                        <td><h3>answer</h3></td>
                    </tr>
                    <tr>
                        <th>subject_1</th>
                    </tr>
                    <script>
                        function final_submit(){
                            alert("final submit");
                            window.location = 'quick_dashbord.php?contest_id='+"_20211";
                        }
                    </script>
                    <tr>
                        <th><button id="_01"><a href="p1.php?contest_id=_20211">01</a></button></th>
                        <th><button id="_02"><a href="p2.php?contest_id=_20211">02</a></button></th>
                        <th><button id="_03"><a href="p3.php?contest_id=_20211">03</a></button></th>
                        <th><button id="_04"><a href="p4.php?contest_id=_20211">04</a></button></th>
                        <th><button id="_05"><a href="p5.php?contest_id=_20211">05</a></button></th>
                        <th><button id="_06"><a href="p6.php?contest_id=_20211">06</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_07"><a href="p7.php?contest_id=_20211">07</a></button></th>
                        <th><button id="_08"><a href="p8.php?contest_id=_20211">08</a></button></th>
                        <th><button id="_09"><a href="p9.php?contest_id=_20211">09</a></button></th>
                        <th><button id="_10"><a href="p10.php?contest_id=_20211">10</a></button></th>
                        <th><button id="_11"><a href="p11.php?contest_id=_20211">11</a></button></th>
                        <th><button id="_12"><a href="p12.php?contest_id=_20211">12</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_13"><a href="p13.php?contest_id=_20211">13</a></button></th>
                        <th><button id="_14"><a href="p14.php?contest_id=_20211">14</a></button></th>
                        <th><button id="_15"><a href="p15.php?contest_id=_20211">15</a></button></th>
                        <th><button id="_16"><a href="p16.php?contest_id=_20211">16</a></button></th>
                        <th><button id="_17"><a href="p17.php?contest_id=_20211">17</a></button></th>
                        <th><button id="_18"><a href="p18.php?contest_id=_20211">18</a></button></th>
                    </tr>
                    <tr>
                       <th><button id="_19"><a href="p19.php?contest_id=_20211">19</a></button></th>
                        <th><button id="_20"><a href="p20.php?contest_id=_20211">20</a></button></th>
                        <th><button id="_21"><a href="p21.php?contest_id=_20211">21</a></button></th>
                        <th><button id="_22"><a href="p22.php?contest_id=_20211">22</a></button></th>
                        <th><button id="_23"><a href="p23.php?contest_id=_20211">23</a></button></th>
                        <th><button id="_24"><a href="p24.php?contest_id=_20211">24</a></button></th>
                    </tr>
                    <tr>
                       <th><button id="_25"><a href="p25.php?contest_id=_20211">25</a></button></th>
                        <th><button id="_26"><a href="p26.php?contest_id=_20211">26</a></button></th>
                        <th><button id="_27"><a href="p27.php?contest_id=_20211">27</a></button></th>
                        <th><button id="_28"><a href="p28.php?contest_id=_20211">28</a></button></th>
                        <th><button id="_29"><a href="p29.php?contest_id=_20211">29</a></button></th>
                        <th><button id="_30"><a href="p30.php?contest_id=_20211">30</a></button></th>
                    </tr>
                    <tr>
                        <th>subject_2</th>
                    </tr>
                    <tr>
                        <th><button id="_31"><a href="p31.php?contest_id=_20211">31</a></button></th>
                        <th><button id="_32"><a href="p32.php?contest_id=_20211">32</a></button></th>
                        <th><button id="_33"><a href="p33.php?contest_id=_20211">33</a></button></th>
                        <th><button id="_34"><a href="p34.php?contest_id=_20211">34</a></button></th>
                        <th><button id="_35"><a href="p35.php?contest_id=_20211">35</a></button></th>
                        <th><button id="_36"><a href="p36.php?contest_id=_20211">36</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_37"><a href="p37.php?contest_id=_20211">37</a></button></th>
                        <th><button id="_38"><a href="p38.php?contest_id=_20211">38</a></button></th>
                        <th><button id="_39"><a href="p39.php?contest_id=_20211">39</a></button></th>
                        <th><button id="_40"><a href="p40.php?contest_id=_20211">40</a></button></th>
                        <th><button id="_41"><a href="p41.php?contest_id=_20211">41</a></button></th>
                        <th><button id="_42"><a href="p42.php?contest_id=_20211">42</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_43"><a href="p43.php?contest_id=_20211">43</a></button></th>
                        <th><button id="_44"><a href="p44.php?contest_id=_20211">44</a></button></th>
                        <th><button id="_45"><a href="p45.php?contest_id=_20211">45</a></button></th>
                        <th><button id="_46"><a href="p46.php?contest_id=_20211">46</a></button></th>
                        <th><button id="_47"><a href="p47.php?contest_id=_20211">47</a></button></th>
                        <th><button id="_48"><a href="p48.php?contest_id=_20211">48</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_49"><a href="p49.php?contest_id=_20211">49</a></button></th>
                        <th><button id="_50"><a href="p50.php?contest_id=_20211">50</a></button></th>
                        <th><button id="_51"><a href="p51.php?contest_id=_20211">51</a></button></th>
                        <th><button id="_52"><a href="p52.php?contest_id=_20211">52</a></button></th>
                        <th><button id="_53"><a href="p53.php?contest_id=_20211">53</a></button></th>
                        <th><button id="_54"><a href="p54.php?contest_id=_20211">54</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_55"><a href="p55.php?contest_id=_20211">55</a></button></th>
                        <th><button id="_56"><a href="p56.php?contest_id=_20211">56</a></button></th>
                        <th><button id="_57"><a href="p57.php?contest_id=_20211">57</a></button></th>
                        <th><button id="_58"><a href="p58.php?contest_id=_20211">58</a></button></th>
                        <th><button id="_59"><a href="p59.php?contest_id=_20211">59</a></button></th>
                        <th><button id="_60"><a href="p60.php?contest_id=_20211">60</a></button></th>
                    </tr>
                    <tr>
                        <th>subject_3</th>
                    </tr>
                    <tr>
                        <th><button id="_61"><a href="p61.php?contest_id=_20211">61</a></button></th>
                        <th><button id="_62"><a href="p62.php?contest_id=_20211">62</a></button></th>
                        <th><button id="_63"><a href="p63.php?contest_id=_20211">63</a></button></th>
                        <th><button id="_64"><a href="p64.php?contest_id=_20211">64</a></button></th>
                        <th><button id="_65"><a href="p65.php?contest_id=_20211">65</a></button></th>
                        <th><button id="_66"><a href="p66.php?contest_id=_20211">66</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_67"><a href="p67.php?contest_id=_20211">67</a></button></th>
                        <th><button id="_68"><a href="p68.php?contest_id=_20211">68</a></button></th>
                        <th><button id="_69"><a href="p69.php?contest_id=_20211">69</a></button></th>
                        <th><button id="_70"><a href="p70.php?contest_id=_20211">70</a></button></th>
                        <th><button id="_71"><a href="p71.php?contest_id=_20211">71</a></button></th>
                        <th><button id="_72"><a href="p72.php?contest_id=_20211">72</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_73"><a href="p73.php?contest_id=_20211">73</a></button></th>
                        <th><button id="_74"><a href="p74.php?contest_id=_20211">74</a></button></th>
                        <th><button id="_75"><a href="p75.php?contest_id=_20211">75</a></button></th>
                        <th><button id="_76"><a href="p76.php?contest_id=_20211">76</a></button></th>
                        <th><button id="_77"><a href="p77.php?contest_id=_20211">77</a></button></th>
                        <th><button id="_78"><a href="p78.php?contest_id=_20211">78</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_79"><a href="p79.php?contest_id=_20211">79</a></button></th>
                        <th><button id="_80"><a href="p80.php?contest_id=_20211">80</a></button></th>
                        <th><button id="_81"><a href="p81.php?contest_id=_20211">81</a></button></th>
                        <th><button id="_82"><a href="p82.php?contest_id=_20211">82</a></button></th>
                        <th><button id="_83"><a href="p83.php?contest_id=_20211">83</a></button></th>
                        <th><button id="_84"><a href="p84.php?contest_id=_20211">84</a></button></th>
                    </tr>
                    <tr>
                        <th><button id="_85"><a href="p85.php?contest_id=_20211">85</a></button></th>
                        <th><button id="_86"><a href="p86.php?contest_id=_20211">86</a></button></th>
                        <th><button id="_87"><a href="p87.php?contest_id=_20211">87</a></button></th>
                        <th><button id="_88"><a href="p88.php?contest_id=_20211">88</a></button></th>
                        <th><button id="_89"><a href="p89.php?contest_id=_20211">89</a></button></th>
                        <th><button id="_90"><a href="p90.php?contest_id=_20211">90</a></button></th>
                    </tr>
                    <th><br><br></th>
                    <tr>
                        <th style="float: right;"><button onclick=final_submit()>submit test</button></th>
                    </tr>
            </table>
            </div>
        </div>
        <script>
            window.onscroll = function() {myFunction()};
            
            var navbar = document.getElementById("answersheet_div");
            var sticky = navbar.offsetTop;
            
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } 
                else {
                    navbar.classList.remove("sticky");
                }
            }
            </script>
    </div>
</body>
</html>



<!-- //////////////////////////////////////////// retriving save user data ///////////////////////////////////////////////////////////////////// -->
<script>
    function changetogreen(id){
        document.getElementById(id).style.background='green';
    }
    function changetoyellow(id){
        document.getElementById(id).style.background='yellow';
    }
</script>
<?php
    if(isset($_SESSION["username"])){
        $con=mysqli_connect('localhost','root');
        mysqli_select_db($con,'general_codeforces');
        $sql = "SELECT * FROM $username WHERE participated_contestid ='$contest_id';";
        $result = $con->query($sql);
        $user = mysqli_fetch_assoc($result);
        $question_ids=array("_01","_02","_03","_04","_05","_06","_07","_08","_09","_10","_11","_12","_13","_14","_15","_16","_17","_18","_19","_20","_21","_22","_23","_24","_25","_26","_27","_28","_29","_30","_31","_32","_33","_34","_35","_36","_37","_38","_39","_40","_41","_42","_43","_44","_45","_46","_47","_48","_49","_50","_51","_52","_53","_54","_55","_56","_57","_58","_59","_60","_61","_62","_63","_64","_65","_66","_67","_68","_69","_70","_71","_72","_73","_74","_75","_76","_77","_78","_79","_80","_81","_82","_83","_84","_85","_86","_87","_88","_89","_90");
        $univisited=-1;//color=white
        $visited=0;//color=yellow
        $answerdwithoption1=1;//color=green
        $answerdwithoption2=2;//color=green
        $answerdwithoption3=3;//color=green
        $answerdwithoption4=4;//color=green
        if($user){
            for($i=0;$i<90;$i++){
                // echo("fsaf");
                if($user[$question_ids[$i]]==0){
                    echo("<script > changetoyellow('$question_ids[$i]')</script>");
                }
                if($user[$question_ids[$i]]>0){
                    echo("<script > changetogreen('$question_ids[$i]')</script>");
                }

            }
        }
    }
?>



