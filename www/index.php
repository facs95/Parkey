<?php

    $error = "";

     if (array_key_exists("submit", $_POST)) {
        
        $link = mysqli_connect();
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

        if (!$_POST['username']) {
            
            $error .= "An email address is required<br>";
            
        } 
        if (!$_POST['email']) {
            
            $error .= "An email address is required<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        }
        
        if (!$_POST['cnpassword']) {
            
            $error .= "Please confirm password<br>";
            
        } else {
            if ($_POST['signUp'] == '1') {
                include 'php/signup.php';
            } else{
                include 'php/login.php';
            }

        }


?>
