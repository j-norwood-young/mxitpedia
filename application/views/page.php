<?php 
	$this->load->view("templates/header");
?>
<h1><?= $title ?></h1>
<h5><a href="http://en.wikipedia.org/wiki/<?= $title ?>">Original Wikipedia version</a></h5>
<div class="row">
<div class="span9 offset1">
	<?= wiki_clean($content) ?>
</div>
</div>
<?php 
	$this->load->view("templates/footer");
?>