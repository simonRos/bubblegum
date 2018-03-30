<?php
function checkLogin($username, $password){
	//should return userInfo
	$userInfo = array(
	"username" => $username,
	"id" => 02,
	"valid" => true
	);
	return $userInfo;
}
if (isset($_POST['login'])) { 
		$info = checkLogin($_POST['username'],$_POST['password']);
		$_SESSION['userInfo'] = $info;
		require('chat.php');
}
else if(isset($_POST['newUser'])){
	require('register.php');
} else {
echo
'<div id="loginform">
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" />
		<br/>
		<label for="password">Password:</label>
        <input type="password" name="password" id="password" />
		<br/>
        <input type="submit" name="login" id="login" value="Login" />
    </form>
	<form action="" method="post">
		<input type="submit" value="New User?" name="newUser" id="newUserButton" />
	</form>
</div>';
}
?>
