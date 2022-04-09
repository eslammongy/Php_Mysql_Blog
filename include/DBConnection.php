<?php


$dbConnect= mysqli_connect('localhost', 'root', '') or die('connection with database fail');
mysqli_select_db($dbConnect, 'blogs_db')


?>