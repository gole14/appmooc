<div class="col-lg-g col-lg-offset-4">
  <h2>Bienvenido</h2>
  <h5>Por favor, ingresa la información requerida debajo</h5>

<?php 
  $fattr = array('class' => 'form-signin');
  echo form_open('/main/register', $fattr); ?>

  <div class="form-group">
    <?php echo form_input(array('name'=>'firstname', 'id'=> 'Firstname', 'placeholder'=>'Nombre', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
      <?php echo form_error('firstname');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'lastname', 'id'=> 'Lastname', 'placeholder'=>'Apellidos', 'class'=>'form-control', 'value'=> set_value('lastname'))); ?>
      <?php echo form_error('lastname');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Correo electrónico', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
      <?php echo form_error('email');?>
    </div>
    <?php echo form_submit(array('value'=>'Registro', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>