<?php
include('database.php');


    $phone  = $_POST['phone'];
    $sql_empid_check = $conn->query("SELECT phone FROM users WHERE phone='$phone'") ;     
    $empid_check = $sql_empid_check->num_rows;    
  
   if ($empid_check==0){
    echo 0;

   }
   else{
    echo 1;
   }
     // echo $empid_check;
     
      //  if($empid_check==0)
      //  {
        
      //   echo 0;
      //  }
      //  else
      //  {
      //   echo 1;
      //  }
       
    
  

?>