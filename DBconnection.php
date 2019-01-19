<?php

//connecting to the database
define ('DB_HOST','localhost');
define('DB_USER','samehcod_sameh');
define('DB_PASS','samehmahmoud');
define('DB_NAME','samehcod_onlinenotes');
        
$conn = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

 // check connection 
    if(mysqli_connect_errno()){
        echo 'failed to connect to MySQL'.mysqli_connect_errno().'</br>'.mysqli_connect_error();
        }
       // else { echo ' connected successfully !<br>';}


?>