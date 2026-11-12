

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
	{
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
	$sql ="SELECT EmailId FROM admin WHERE EmailId=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo "<script>alert('Your Password succesfully changed');</script>";
}
else {

echo "<script>alert('Email id or Mobile no is invalid');</script>";
}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Forgot Password	</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
<!-- //lined-icons -->
</head> 
<style> 
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background-image:url('../images/bg.jpg');
	background-repeat: no-repeat;
	background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.sin-w3-agile {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 400px;
    text-align: center;
    color: #fff;
}

.sin-w3-agile h2 {
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: 600;
}

.sin-w3-agile input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: none;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    font-size: 14px;
    outline: none;
}
.sin-w3-agile label {
	width: 100%;
	text-align:left;
	color:#080710;
	border-radius: 10px;
}

.login-w3 button {
    width: 100%;
    padding: 10px;
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    color: #080710;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.login-w3 button:hover {
    background-color: rgba(255, 255, 255, 0.5);
}

.back a {
    color: #fff;
    font-size: 14px;
    text-decoration: none;
    display: block;
    margin-top: 20px;
}

.back a:hover {
    text-decoration: underline;
}

::placeholder {
    color: rgba(255, 255, 255, 0.7);
}
</style>
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
	
		<form  name="chngpwd" method="post" onSubmit="return valid();">
		<h2>Forgot Password</h2>
			<div class="username">
				<label for class="username">Email id:</label>
				<input type="email" name="email" class="name" placeholder="Reg Email id" required="">
				<div class="clearfix"></div>
			</div>
			<div>
			<div class="username">
				<label class="username">Mobile No:</label>
				<input type="text" name="mobile" class="name" placeholder="Reg Mobile Number" required="" maxlength="10">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<label class="username">New Password:</label>
				<input type="password" class="password" name="newpassword" id="newpassword" placeholder="New Password" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<label class="username">Confirm Password:</label>
				<input type="password" name="confirmpassword" id="confirmpassword" class="password" placeholder="Confirm Password" required="">
				<div class="clearfix"></div>
			</div>
			<div class="login-w3">
					<button name="submit">Reset</button>
			</div>
			<div class="clearfix"></div>
				<div class="back">
					<a href="index.php" style="color: #fff;">Signin</a>
				</div>
		</form>

	</div>
	</div>
	</div>
</body>
</html>