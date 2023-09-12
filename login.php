<?php

include_once("database.php");


    $username= $_POST['username']; 
    $password= $_POST['password']; 

    if(!empty($username) && !empty($password)){

        
        $query = "SELECT username, password FROM users where username ='$username'and password ='$password'" ;
       
        $result = $conn->query($query);
        if($result->num_rows > 0) {
         
           echo "success";
        } else {
            echo "Wrong email and password";
        }
     
   } else {
      echo "All Fields are required";
   }
