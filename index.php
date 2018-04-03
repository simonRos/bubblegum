<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php 
	session_start();
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>

</head>
<body> 
	<?php
		//var_dump($_POST);
		if(isset($_POST['logout']) && $_POST['logout'] == true){
			$_SESSION['userInfo'] = null;
			$_POST['logout'] = false;
			require('login.php');
		}
		else if (isset($_SESSION['userInfo']) && $_SESSION['userInfo']['valid']){
			require('chatSelect.php');
		}
		else{
			if(isset($_POST['newUser']) || isset($_POST['register'])){
				require('register.php');
			}else{
				require('login.php');
			}
		}
	?>
</body>

</html>