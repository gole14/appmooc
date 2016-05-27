<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Area privada</title>
</head>
<body>
<div class="page-container">
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-left">
        
        <!-- sidebar -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="users_as_admin">Usuarios</a></li>
              <li><a href="courses_as_admin">Cursos</a></li>              
            </ul>
        </div>
  	
        <!-- main area -->
        <div class="col-xs-12 col-sm-9">
          

        <?php
          $fattr = array('class' => 'form-newcourse');
          echo form_open('/main/admin_alta_de_curso', $fattr); ?>

          <div class="form-group">
            <?php echo form_input(array('name'=>'nombre', 'id'=> 'Nombre', 'placeholder'=>'Nombre del curso', 'class'=>'form-control', 'value' => set_value('nombre'))); ?>
              <?php echo form_error('nombre');?>
            </div>
            <div class="form-group">
              <?php echo form_input(array('name'=>'fechayhora', 'id'=> 'fechayhora', 'placeholder'=>'Fecha y hora (dd-mm-aa hh:mm:ss)', 'class'=>'form-control', 'value'=> set_value('fechayhora'))); ?>
              <?php echo form_error('fechayhora');?>
            </div>
            <?php echo form_submit(array('value'=>'Dar de alta el curso', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
            <?php echo form_close(); ?>




          
        </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->
</div><!--/.page-container-->
</body>
</html>