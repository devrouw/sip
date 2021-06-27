<?php
$db = mysqli_connect($setDb['db_host'],$setDb['db_user'], $setDb['db_password']);
mysqli_select_db($db,$setDb['db_name']);