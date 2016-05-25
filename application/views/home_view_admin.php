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
	<table class="table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>First Name</th>
		      <th>Last Name</th>
		      <th>Username</th>
		    </tr>
		  </thead>
		  	<tbody>

		<?php if(!empty($estu)): ?>
			<?php foreach ($estu as $estu_item): ?>
				<th scope="row">
					<?php $id = $estu_item->id;; ?>
			        <?php echo $id ?>	
			    </th>
			<?php endforeach; ?>
			<?php else: ?>
				<h3><?php echo "NO HAY NINGUN USUARIO REGISTRADO" ?></h3>
			<?php endif; ?>
		</tbody>
	</table>
</div>


</body>
</html>