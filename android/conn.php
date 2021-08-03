<?php
 $con = mysqli_connect("localhost","u250888599_usersip","Siplah1234");
 mysqli_select_db($con,"u250888599_sip");

  if($con == false){
     echo "not connected";
 }else{
     echo "connected";
 }

?>