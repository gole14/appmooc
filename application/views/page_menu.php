<div id="sidebar" class="sidebar">
	<!--Sidebar-->
	<div class="sidebar-page">
		<span class="sidebar-title">Cursos disponibles</span>
		<div class="feature-menu">
		<ul>

			<?php if(!empty($cursitos)): ?>
			<?php foreach ($cursitos as $curso): ?>


				<?php 
					$nombre = $curso->nombre;
					$url = $curso->url_video;
					$idc = $curso->idcurso; 

				?>
			    <li><a href="<?php echo site_url('main/cursounico'); ?>"> <?php echo $nombre ?> </a></li>


			<?php endforeach; ?>
			<?php else: ?>
				<h3><?php echo "AUN NO TE HAS INSCRITO A NINGUN CURSO" ?></h3>
			<?php endif; ?>

		</ul>
	</div>
</div>
	<!--/Sidebar-->
	<!--Sidebar-->
<div class="sidebar-page">
	<span class="sidebar-title"> Información</span>
	<div class="feature-menu">
		<div class="textwidget"><p> Suscribete al boletín de noticias para que siempre te enteres antes que nadie de los nuevos cursos que podrían interesarte. </p></div>
	</div>
</div>
	<!--/Sidebar-->
<div class="sidebar-banner">
	<a href="#"><img src="<?php echo base_url('assets/images/banner.png'); ?>" alt=""> </a
</div>
</div>