<?php 
	$this->load->view("templates/header");
?>
<div class="row">
<div class="span3 offset6">
<form>
	<input name="search" placeholder="Search" />
	<input type="submit" name="submit" value="Search" />
</form>
</div>
</div>
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