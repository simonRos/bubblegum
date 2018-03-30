<?php
$registrationFormHTML =
'<div id="registration">
    <form action="" method="post">
        <label for="newUsername">Username:</label>
        <input type="text" name="newUsername" id="newUsername" />
		<br/>
		<label for="newUserPassword">Password:</label>
        <input type="password" name="newUserPassword" id="newUserPassword" />
		<br/>
		<label for="newUserEmail">Email:</label>
		<input type="email" name="newUserEmail" id="newUserEmail" required/>
		<br/>
        <input type="submit" name="register" id="register" value="Register" />
    </form>
</div>';

function registerNewUser($username, $password, $email){
	//should create new user in the database
	$result = array("valid"=>null, "message"=>"");
	$passResult = checkPasswordValid($password);
	if(checkUserExists($username)){
		$result['message'] .= "Username already in use! ";
		$result['valid'] = false;
	}
	else if(strlen($passResult) > 1){
		$result['message'] .= "Password does not meet requirements!: " . $passResult;
		$result['valid'] = false;
	}
	else {
		$result['valid'] = true;
		unset($_POST['newUser']);
	}
	return $result;
}

function checkUserExists($username){
	//check if user already exists
	return false;
}

function checkPasswordValid($password){
	$passwordErr = "";
	//check against password requirements
	if (strlen($password) <= '8') {
        $passwordErr .= "Your Password Must Contain At Least 8 Characters! ";
    }
    if(!preg_match("#[0-9]+#",$password)) {
        $passwordErr .= "Your Password Must Contain At Least 1 Number! ";
    }
    if(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr .= "Your Password Must Contain At Least 1 Capital Letter! ";
    }
    if(!preg_match("#[a-z]+#",$password)) {
        $passwordErr .= "Your Password Must Contain At Least 1 Lowercase Letter! ";
    }
	return $passwordErr;
}

if (isset($_POST['register'])) { 
	$registerResult = registerNewUser($_POST['newUsername'],$_POST['newUserPassword'],$_POST['newUserEmail']);
	if($registerResult['valid'] == true){
		echo "Congrajulations! We'll send your email confirmation shortly";
		require('login.php');
	} else {
		echo $registerResult['message'];
		echo $registrationFormHTML;
	}
} else {
	echo $registrationFormHTML;
}

?>