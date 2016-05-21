<div class="col-lg-4 col-lg-offset-4">
    <h2>¿Olvidaste tu contraseña?</h2>
    <p>Por favor ingrese su correo electrónico, ahí se enviarán instrucciones para reestablecer la contraseña</p>
    <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'/main/forgot/', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array(
          'name'=>'email', 
          'id'=> 'email', 
          'placeholder'=>'Email', 
          'class'=>'form-control', 
          'value'=> set_value('email'))); ?>
      <?php echo form_error('email') ?>
    </div>
    <?php echo form_submit(array('value'=>'Submit', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>    
</div>