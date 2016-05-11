<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Login - Area privada</title>
</head>
<body>
	<h1>Home</h1>
	<h2>Welcome <?php echo $email; ?>! </h2>
	<a href="<?php echo base_url('main/logout/'); ?>">Logout</a>
</body>
</html>