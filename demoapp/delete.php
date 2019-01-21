<?php
    $id=$_REQUEST['id'];
    include('connectdB.php');
    $q="delete from demo where sid='$id'";
    mysqli_query($con,$q);
    echo "Data deleted successfully!!";

?>