<?php
    include('connectdB.php');
    $word= $_REQUEST['word'];
    if($word==''){
        $qry= "SELECT * FROM DEMO";    
    }
    else{
        $qry= "SELECT * FROM DEMO where sname like '$word%'";
    }
    
    
    $result= mysqli_query($con,$qry);
    $arr=[];
    while($res= mysqli_fetch_array($result)){
        array_push($arr,$res);
    }

    echo json_encode($arr);

?>