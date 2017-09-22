<?php

$query = "SELECT * FROM `users` WHERE user = '".mysqli_real_escape_string($link, $_POST['username'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['id']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['id'] = $row['id'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                setcookie("id", $row['id'], time() + 60*60*24*365);

                            } 

                            header("Location: loggedinpage.php");
                                
                        } else {
                            
                            $error = "That username/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That username/password combination could not be found.";
                        
                    }
?>