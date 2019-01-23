<?php 
// if user is not logged in $ remmberme cookie exist 
if(!empty($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])){
// f1:$a.bin2hex($b);
// f2:hash('sha256',$a);
  //extract auth factors from cookies 
  list($authentificator1,$authentificator2) = explode(',',$_COOKIE['rememberme']);
  $authentificator2=hex2bin($authentificator2);
  $f2authentificator2= hash('sha256',$authentificator2);
    //look for auth 1 in remember me table 
    $sql = "SELECT * FROM rememberme WHERE authentificator1='$authentificator1'";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
      exit;
    }
    
    if(!mysqli_num_rows($result)==1){
        echo '<div class="alert alert-danger">user not found in remember me table!</div>';
        
    }else{
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(!hash_equals($row['f2authentificator2'],$f2authentificator2)){
            echo '<div class="alert alert-danger">Error  running remember me process!</div>';

        }else{

  //generate new auth factors&store them in cookie and remember me table
    #$_SESSION['user_id']=$row['user_id'];
    $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10)); //10 bytes = 80 bits /4 = 20 charcters
    $authentificator2 = (openssl_random_pseudo_bytes(20));
    function f1($a,$b){
    $c=$a.",".bin2hex($b);
    return $c;
       }
    $cookieValue =f1($authentificator1,$authentificator2);
    setcookie("rememberme",$cookieValue,time()+15*24*60*60);
    //preparing variable for the sql query 
    function f2 ($a){
    $res =hash('sha256',$a);
    return $res;
      }
    $f2authentificator2=f2($authentificator2);
    $user_id = $SESSION['user_id'];
    $expiration = date('Y-m-d H:i:s',time()+15*24*60*60);
    // run query to store in remember me table 
    $sql = "INSERT INTO rememberme (authentificator1, f2authentificator2,user_id , expires) VALUES ('$authentificator1','$f2authentificator2','$user_id','$expiration')";
    $result =mysqli_query($conn,$sql);
    if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
    }
    $SESSION['user_id']=$row['user_id'];
    header("location:mainpageloggedin.php");


















        }

    }
      


}
       //else print error
       // true , generate new auth factors&store them in cookie
       //log the user in 
















?>