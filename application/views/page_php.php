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

	<input type="hidden" value="1" name="idcurso">
	
	<?php echo form_submit(array('id' => 'submit', 'value' => 'Registrarse al curso')); ?>
	<?php echo form_close(); ?><br/>
</div>

<?php
    if ($this->session->flashdata('message')) {
    ?>
    <div class="alert alert-success fade in">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php
    }
?>

</body>
</html>