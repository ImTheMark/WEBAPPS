<!DOCTYPE html>

<html>

<head>

<?php 
	session_start();
	include_once('includes/connection.php');
	
	$error = "";
	
	function login($username, $password)
	{
		$query = "SELECT * FROM company WHERE companyname='$username' AND password='$password'";
	   $result = mysql_query($query);
	   $num_row = mysql_num_rows($result);

	   if( $num_row == 1 )
	   {
		 while( $row=mysql_fetch_array($result) ){
		  $_SESSION['login'] = $username;
		  echo $_SESSION['login'];
		 }
	   } else {
		  return false;
	   }

	  return true;
	}
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$validLogin = login($_POST['username'], $_POST['password']);

		if ($validLogin || (isset($_SESSION['login']) && $_SESSION['login']!="")){
			header("Location: index.php");
		 } else {
			$error = "Invalid Companyname or Password";
		 }

	}

?>

</head>

<body>
	<h2><br>Web Site Administration<br>
	</h2> <p>Please log in below</p> 
	<form   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
	<b>Company Name:</b> 
	<br> <input type="text" size="20" name="username">
	<br> <br> <b>Password:</b> 
	<br><input type="password" size="20" name="password"> <br>
	<br> <input type="submit" value="login"> </form>
	<h4> <?php echo $error; ?> </h4>
</body>

</html>

<?php
	
?>