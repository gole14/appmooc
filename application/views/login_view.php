<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ejemplo Login con CodeIgniter</title>
</head>
<body>
	<h1>Ejemplo Login con CodeIgniter</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('Verifylogin'); ?>  <!-- En esta parte no estoy seguro si debe ir con la V mayuscula o no -->
		<label for="username">Username:</label>
		<input type="text" size="15" id="username" name="username" />
		<br/>
		<label for="passwrd">Password:</label>
		<input type="password" size="20" id="passwrd" name="passwrd" />
		<br/>
		<input type="submit" value="Login" />
	</form>
</body>
</html>