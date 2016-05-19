<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
<div class="blog">
	<div id="blog_text">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/kY5P9sZqFas" frameborder="0" allowfullscreen></iframe>
	</div>

	<?php echo form_open('main/insert_ctrl'); ?>

	<?php echo form_input(array('id' => 'idcurso', 'name' => "idcurso", 'value'=>set_value('idcurso',"1"))); ?><br />
	<?php echo form_input(array('id' => 'idusuario', 'name' => 'idusuario', 'value'=>set_value('idusuario', $id))); ?><br />
	
	<?php echo form_submit(array('id' => 'submit', 'value' => 'Registrarse al curso')); ?>
	<?php echo form_close(); ?><br/>
</div>


</body>
</html>