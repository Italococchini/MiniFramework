<?php $view->start_section(); ?>
	<h1>Header</h1>
<?php $view->end_section('header'); ?>

<?php $view->start_section(); ?>
	<h1>Footer</h1>
<?php $view->end_section('footer'); ?>

<?php	
	$view->start_section(); 
	$input->get('user_id');
	$input->get('comment_id'); 
	$view->end_section('content');
?> 




