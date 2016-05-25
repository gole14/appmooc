<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Area privada</title>
</head>
<body>
<div class="hero-unit">
	<div id="blog_text">
		<h1><?php echo 'Mis cursos'; ?></h1>

		<?php if(!empty($estu)): ?>
			<?php foreach ($estu as $estu_item): ?>
				<button type="button" class="btn btn-default btn-lg btn-block">
					<?php $id = $estu_item->id;; ?>
			        <h3><?php echo $id ?></h3>	
			    </button>
			<?php endforeach; ?>
			<?php else: ?>
				<h3><?php echo "NO HAY NINGUN USUARIO REGISTRADO" ?></h3>
			<?php endif; ?>
		
	</div>
</div>


</body>
</html>