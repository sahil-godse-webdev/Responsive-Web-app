<?php
    include('connectdB.php');
    $word= $_REQUEST['word'];
    //echo "$word";
    $q= "SELECT * FROM DEMO where sname like '$word%'";
    $result=mysqli_query($con,$q);
    $arr=[];
    while($res= mysqli_fetch_array($result)){
        array_push($arr,$res);
    }
    
    echo json_encode($arr);
?>