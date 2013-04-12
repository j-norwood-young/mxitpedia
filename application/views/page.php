<?php 
	$this->load->view("templates/header");
?>
<h1><?= $title ?></h1>
<div class="row">
<div class="span9 offset1">
	<?= wiki_clean($content) ?>
</div>
</div>
<?php 
	$this->load->view("templates/footer");
?>