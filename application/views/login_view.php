<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ejemplo Login con CodeIgniter</title>
</head>
<body>
	<h1>Iniciar sesión</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open('Verifylogin'); ?>
		<label for="username">Usuario:</label>
		<input type="text" size="15" id="username" name="username" />
		<br/>
		<label for="passwrd">Contraseña:</label>
		<input type="password" size="20" id="passwrd" name="passwrd" />
		<br/>
		<input type="submit" value="Login" />
	</form>
</body>
</html>