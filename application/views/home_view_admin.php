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

	<?php if(!empty($estu)): ?>
	<table class="table">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Email</th>
		      <th>Nombre</th>
		      <th>Apellido</th>
		      <th>Último inicio de sesión</th>
		    </tr>
		  </thead>
		  	<tbody>

		
			<?php foreach ($estu as $estu_item): ?>
				<tr>
					<th scope="row">
						<?php $id = $estu_item->id; ?>
				        <?php echo $id ?>	
				    </th>
				    <th>
				    	<?php $email = $estu_item->email; ?>
				    	<?php echo $email ?>
				    </th>
				    <th>
				    	<?php $first_name = $estu_item->first_name; ?>
				    	<?php echo $first_name ?>
				    </th>
				    <th>
				    	<?php $last_name = $estu_item->last_name; ?>
				    	<?php echo $last_name ?>
				    </th>
				    <th>
				    	<?php $last_login = $estu_item->last_login; ?>
				    	<?php echo $last_login ?>
				    </th>
				</tr>
			<?php endforeach; ?>
			
		</tbody>
	</table>
	<?php else: ?>
				<h3><?php echo "NO HAY NINGUN USUARIO REGISTRADO" ?></h3>
	<?php endif; ?>
</div>


</body>
</html>