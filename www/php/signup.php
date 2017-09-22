<?php
               
               
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);
                
                $query2= "SELECT id FROM `users` WHERE user = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";

                $result2 = mysqli_query($link, $query2);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                }else if(mysqli_num_rows($result2) > 0){

                    $error = "That username is taken.";

                } else {

                    $query = "INSERT INTO `users` (`user`, `email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."','".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);

                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);

                        } 

                        header("Location: loggedinpage.php");

                    }

                } 

?>