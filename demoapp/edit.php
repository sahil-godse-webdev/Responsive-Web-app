<?php

    include('connectdB.php');
    $id= $_REQUEST['id'];
    $name= $_REQUEST['name'];
    $mail= $_REQUEST['mail'];
    $dob= $_REQUEST['dob'];
    
    $q="UPDATE demo set sname='$name',semail='$mail',sdob='$dob' where sid= '$id'";
    mysqli_query($con,$q);
    
?>