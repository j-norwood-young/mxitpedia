<!DOCTYPE html>
<html lang="en-gb">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>Mopedia</title>
	<link rel="stylesheet" type="text/css" href="/resources/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/resources/css/style.css" />
</head>
<body>
	<div class="container header">
		
		<div class="row">
			<div class="span3">
				<a href="<?= base_url() ?>"><img src="/resources/images/logo.png" alt="" /></a>
			</div>
			<div class="span7 offset2">
				<div class="row">
					<ul class="nav nav-pills">
						<li class="">
							<a href="<?= base_url() ?>">Home</a>
						</li>
						<li>
							<form action="" method="post">
								<input name="search" type="search" placeholder="Search" value="" />
								<input type="submit" name="submit" value="Search" />
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container body">