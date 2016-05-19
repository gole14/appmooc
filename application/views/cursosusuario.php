<h2><?php echo 'Mis cursos'; ?></h2>

<?php foreach ($cpu as $cpu_item): ?>

        <h3><?php echo $cpu_item['nombre']; ?></h3>
        <div class="main">
                <?php echo $cpu_item['fechayhora']; ?>
        </div>

<?php endforeach; ?>