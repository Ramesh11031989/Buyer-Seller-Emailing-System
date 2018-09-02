<?php 
 //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
	

    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['logged_in'] = time();
            $_SESSION['username'] = $username;      
            $_SESSION['user_type'] = $user_type; 			
								if($user_type === 0){
								header("location: buyer_dashboard/dashboard.php");
								}

								if($user_type === 1){
								header("location: seller_dashboard/dashboard.php");
								}

								if($user_type === 2){
								header("location: admin_dashboard/dashboard.php");
								}
            
            //Redirect to our protected page, which we called index.php
            header('Location: index.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }
?>