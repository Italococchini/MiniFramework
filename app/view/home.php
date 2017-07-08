
<?php $layout = 'layout-blank'; ?>

<?php $view->start_section(); ?>
<h1>Header</h1>
<?php $view->end_section('header'); ?>


<?php $view->start_section(); ?>

<h1>prueba MVC:</h1>
<h1>x: <?php $input->get('user_id'); ?></h1>
<h1>s: <?php $input->get('comment_id'); ?></h1>

<?php $view->end_section('content'); ?>

<?php $view->start_section(); ?>
<h1>Footer</h1>
<?php $view->end_section('footer'); ?>
