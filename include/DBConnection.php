<?php
$hostName = 'localhost';
$userName = 'root';
$password = "";
$dbName = 'blogs_db';

$dbConnect= mysqli_connect($hostName, $userName, $password, $dbName);

/* if(isset($dbConnect)){
    echo "Connection Success";
}else{
      echo "Connection Fail";
}
 */

?>