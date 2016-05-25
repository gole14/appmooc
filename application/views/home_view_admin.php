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

		<?php if(!empty($estu)): ?>
			<?php foreach ($estu as $estu_item): ?>
				<button type="button" class="btn btn-default btn-lg btn-block">
			        <h3><?php echo $estu_item['nombre']; ?></h3>
			        <div class="main">
			                <?php echo $estu_item['fechayhora']; ?>
			        </div>
			    </button>
			<?php endforeach; ?>
			<?php else: ?>
				<h3><?php echo "NO HAY NINGUN USUARIO REGISTRADO" ?></h3>
			<?php endif; ?>
		
	</div>
</div>


</body>
</html>