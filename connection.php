<?php

$user = "doadmin";
$password = "lbhmsc83fl4rid63";

$connect = new PDO(
    "mysql:host=db-first-year-university-do-user-3139474-0.b.db.ondigitalocean.com;dbname=defaultdb;port=25060;charset=utf8",
    $user,
    $password,
    );

// $user = "root";
// $password = "";

// $connect = new PDO(
//     "mysql:host=localhost;dbname=aula-gam3a;charset=utf8",
//     $user,
//     $password,
//     );

@ob_start();
@session_start();

//Function 
function price_format($price) {
  
  if($price == "")
  {
    
    return "غير محدد"; 
    
  } else if (!is_numeric($price) ) {
    
    return $price; 
    
  } else{
    
    return number_format($price)  . " / سنه ";
    
  }
  
}