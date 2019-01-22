<?php
session_start();
include_once("model/Users.php");

$error="";
// echo "POST : ".$_POST;
// foreach ( $_POST as $key => $value ) {
// 	print $key . " = " . $value."</br>" ;
//   }

if(!empty($_POST) && isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $usercode = !empty($_POST['usercode']) ? trim($_POST['usercode']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
	//Retrieve the user account information for the given usercode.
    // $sql = "SELECT * FROM employee WHERE empcd=:usercode AND emppwd=MD5(':password') LIMIT 1";
    // $stmt = $pdo->prepare($sql);
    
    //Bind value.
    // $stmt->bindValue(':usercode', $usercode);
    // $stmt->bindValue(':password', $password);
    
    //Execute.
    // $stmt->execute();
    
    //Fetch row.
	// $user = $stmt->fetch(PDO::FETCH_ASSOC);
	$userModel = new Users();
	$user=$userModel->getUser($usercode);
	// echo '</br>';
	// print_r($user);

	// foreach ( $user as $key => $value ) {
	// 	print $key . " = " . $value."</br>" ;
	//   }
    // echo $user;
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
		//Compare the passwords.
		// echo '</br>'.md5($passwordAttempt);
		// echo '</br>'.$user['emppwd'];
		// $validPassword = password_verify(md5($passwordAttempt), $user['password']);
		$validPassword = (md5($passwordAttempt) == $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            // $_SESSION['usercode'] = $user['empcd'];
            $_SESSION['UserData'] = $user;
			// $_SESSION['logged_in'] = time();
			
			// print_r($_SESSION['UserData']);
            
            //Redirect to our protected page, which we called home.php
            header('Location: index.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }
    
}
 
?>
<!doctype html>
<html>
<!-- <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>PHP Login Script (PHP, MySQL, Bootstrap, jQuery, Ajax and JSON)</title>
</head> -->
<head>
    <title>Krua Kroo Meuk ERP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-kkm.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
      			<!-- <form action="submit.php" method="post" name="login_form" id="login_form" autocomplete="off"> -->
				<form action="login.php" method="post" name="login" id="login" autocomplete="off" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="usercode" id="usercode" placeholder="User code">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="login" value="Login">Login</button>
					</div>

					<div class="container-login100-form-btn alert-validate m-t-24"><!-- Invalid Usercode or Password -->
						<?php $error ?>
					</div>

				</form>
			</div>
		</div>
	</div>
	

    <div id="dropDownSelect1"></div>
    
	<!-- Include CSS -->
	<!-- <link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/style.css" rel="stylesheet"> -->
	<!-- Include Google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,600"> 
	<!-- Include JavaScripts -->
	<!-- <script src="./js/jquery.min.js" async></script>
	<script src="./js/bootstrap.min.js" async></script> -->
	<script src="js/app.js" async></script>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
