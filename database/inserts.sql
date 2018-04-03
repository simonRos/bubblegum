$server = "localhost";
$options = array("UID" => "admin", "Database" => "TestDB Bubblegum", "ReturnDatesAsStrings" => true);
$conn = sqlsrv_connect($server, $options);

if ($conn === false) die("<pre>".print_r(sqlsrv_errors(), true));

$new_name = $_POST['form_name'];
$new_password = $_POST['form_pwd'];
$new_email = $_POST['form_email'];
$newuser_level = $_POST[''];
$email_verified = $_POST[]

$sql = "insert into dbo.users (name, password, user_level, user_email, email_verified) 
values ('$new_name', '$new_password', '$newuser_level', '$new_email', '$email_verified')"


--for checking username, create select statement run from php