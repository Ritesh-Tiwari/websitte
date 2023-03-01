<?php
include("connection.php");  


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // collect value of input field
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    // search username avilable or not
    $record=$models->execute_kw($db, $uid, $password, 'customer.details', 'search_read', array(array(array('username', '=', $user_id))), array('fields'=>array('id'), 'limit'=>1));
    if (empty($record)) {
    
        // Create new user
        $n_id=$models->execute_kw($db, $uid, $password, 'customer.details', 'create', 
        array(array('name'=>$name,'phone'=>$phone,'email'=>$email,'username'=>$user_id,'password'=>$pass)));
        $_SESSION['id']=(int)$n_id;
        
        // create docker file for user 
        $models->execute_kw($db, $uid, $password,'customer.details', 'action_createCustomer',array(array($n_id)));
        header("Location: dashboard.php");
    
    }else{
   
        echo $user_id." This username is not available please try other name.";
    }
}

?>