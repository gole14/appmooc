	<div class="blog">
	<div id="blog_text">
		<h2><?php echo 'Mis cursos'; ?></h2>

			<?php foreach ($cpu as $cpu_item): ?>
				<div class="bg-info">
			        <h3><?php echo $cpu_item['nombre']; ?></h3>
			        <div class="main">
			                <?php echo $cpu_item['fechayhora']; ?>
			        </div>
			    </div>
			<?php endforeach; ?>
	</div>
</div>
<div id="sidebar" class="sidebar">
	<!--Sidebar-->
	<div class="sidebar-page">
		<span class="sidebar-title">Cursos disponibles</span>
		<div class="feature-menu">
		<ul>
			<li><a href="<?php echo base_url('main/php'); ?>">PHP</a></li>
			<li><a href="css">CSS</a></li>
			<li><a href="javascript">Javascript</a></li>
			<li><a href="codeigniter">CodeIgniter</a></li>
			<li><a href="html5">HTML5</a></li>
			<li><a href="mysql">MySQL</a></li>
			<li><a href="mailget">Mailget</a></li>
			<li><a href="others">Others</a></li>
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
	<a href="#"><img src="<?php echo base_url(); ?>assets/images/banner.png" alt=""> </a>
</div>
</div>