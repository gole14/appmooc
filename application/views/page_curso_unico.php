<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
<div class="blog">
	<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo "YA ESTÁS INSCRITO A ESTE CURSO" ?>
    </div>
    <?php } ?>


	<div id="blog_text">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/".<?php echo $video ?> frameborder="0" allowfullscreen></iframe>
	</div>

	<?php echo form_open('main/insert_ctrl'); ?>

	<input type="hidden" value="<?php echo $idc ?>" name="idcurso">
	
	<?php echo form_submit(array('id' => 'submit', 'value' => 'Registrarse al curso', 'class' => 'btn btn-primary btn-lg')); ?>
	<?php echo form_close(); ?><br/>
</div>

</body>
</html>