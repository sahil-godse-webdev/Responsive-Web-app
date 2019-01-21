<?php
    include('connectdB.php');
    $name= $_REQUEST['name'];
    $mail= $_REQUEST['mail'];
    $dob= $_REQUEST['dob'];
 
    $q= "insert into demo(sname,semail,sdob) values ('$name','$mail','$dob')";

    mysqli_query($con,$q);
    
    echo "Data Inserted Successfully!!";

?>