<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ejemplo Login con CodeIgniter - Area privada</title>
</head>
<body>
	<h1>Home</h1>
	<h2>Welcome <?php echo $username; ?>! </h2>
	<a href="home/logout">Logout</a>
</body>
</html>