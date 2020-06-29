<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>How Far Am I</title>
	<meta name="description" content="How Far Am I">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BROWSER ICON -->
    <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.png") ?>" type="image/x-icon" />

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- CSS STYLE -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/common.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/fstdropdown.css") ?>" />
    
    <!-- JS SCRIPT -->
    <script type='text/javascript' src='<?= base_url("assets/js/script.js") ?>'></script>
    <script type='text/javascript' src='<?= base_url("assets/js/fstdropdown.js") ?>'></script>
    
</head>
<body>

<!-- HEADER: TITLE -->
<nav class="navbar navbar-light bg-light">
	<a class="navbar-brand mx-auto" href="<?= base_url() ?>">
    	<img src="<?= base_url("assets/images/favicon.png") ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    How Far Am I?
  </a>
</nav>

<!-- CONTENT -->
<div class="container-fluid" id="content">
	<?= $this->renderSection('content') ?>
</div>
<!-- FOOTER -->
<div class="container-fluid bg-light" id="footer">
  <div class="row">
    <div class="col-sm">
      <?= date('Y') ?> - Danielson Silva 
		<a href="https://www.linkedin.com/in/danielson-silva/" target="_blank">
			<img src="<?= base_url("assets/images/LI-In-Bug.png") ?>" alt="Linkedin Profile" width="32px" height="32px">
		</a>
		<a href="https://github.com/DanielsonSilva" target="_blank">
			<img src="<?= base_url("assets/images/GitHub-Mark-32px.png") ?>" alt="Github Profile" width="32px" height="32px">
		</a>
		<a href="https://packagist.org/users/DanielsonSilva/packages/" target="_blank">
			<img src="<?= base_url("assets/images/packagist.png") ?>" alt="Packagist Profile" width="32px" height="32px">
		</a>
    </div>
  </div>
</div>
</body>
</html>
