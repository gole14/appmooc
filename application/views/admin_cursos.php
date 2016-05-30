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
              <li class="active"><a href="admin">Home</a></li>
              <li><a href="users_as_admin">Usuarios</a></li>
              <li><a href="courses_as_admin">Cursos</a></li>              
            </ul>
        </div>

        <a href="admin_alta_de_curso">
        <button type="button" class="btn btn-primary btn-lg btn-block">Dar de alta un curso</button>
        </a>
    <?php if(!empty($curs)): ?>
  <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Fecha y hora</th>
        </tr>
      </thead>
        <tbody>

    
      <?php foreach ($curs as $curso_item): ?>
        <tr>
          <th scope="row">
            <?php $idcurso = $curso_item->idcurso; ?>
                <?php echo $idcurso ?> 
            </th>
            <th>
              <?php $nombre = $curso_item->nombre; ?>
              <?php echo $nombre ?>
            </th>
            <th>
              <?php $fechayhora = $curso_item->fechayhora; ?>
              <?php echo $fechayhora ?>
            </th>
            <th>
              <?php echo form_open('main/deleteCurso'); ?>
              <input type="input" value="<?php echo $idcurso ?>" name="idcurso">

              <?php echo form_submit(array('value'=>'Eliminar', 'class'=>'btn btn-warning')); ?>
              <?php echo form_close(); ?><br/>
            </th>
        </tr>
      <?php endforeach; ?>
      
    </tbody>
  </table>
  <?php else: ?>
        <h3><?php echo "NO HAY NINGUN CURSO DADO DE ALTA" ?></h3>
  <?php endif; ?>
    </div><!--/.row-->
  </div><!--/.container-->
</div><!--/.page-container-->
</body>
</html>