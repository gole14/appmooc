<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Area privada</title>
</head>
<body>
<div class="blog">
	<div id="blog_text">
		<h1><?php echo 'Mis cursos'; ?></h1>

			<?php foreach ($cpu as $cpu_item): ?>
				<button type="button" class="btn btn-default btn-lg btn-block">
			        <h3><?php echo $cpu_item['nombre']; ?></h3>
			        <div class="main">
			                <?php echo $cpu_item['fechayhora']; ?>
			        </div>
			    </button>
			<?php endforeach; ?>
	</div>
</div>


</body>
</html>