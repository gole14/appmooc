<div class="col-md-7 col-md-push-6">
</br>
</br>
</br>
<img src="<?php echo base_url(); ?>assets/images/description.jpg" alt=";)" class="img-rounded img-responsive">
</div>
<div class="col-md-5 col-md-pull-6">
    <h2>  Iniciar sesión</h2>
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'/main/login/', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'placeholder'=>'Correo electrónico', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
      <?php echo form_error('email') ?>
    </div>
    <div class="form-group">
      <?php echo form_password(array(
          'name'=>'password', 
          'id'=> 'password', 
          'placeholder'=>'Contraseña', 
          'class'=>'form-control', 
          'value'=> set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
    <?php echo form_submit(array('value'=>'Ingresar', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
    <p>¿No tienes una cuenta? <a href="<?php echo site_url();?>/main/register">Haz click aquí para crear una.</a></p>
    <p>Click <a href="<?php echo site_url();?>/main/forgot">aquí</a> si olvidaste tu contraseña.</p>


</div>
