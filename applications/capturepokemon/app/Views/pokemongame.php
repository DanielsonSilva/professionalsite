<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pokemon Capture Game</title>
	<meta name="description" content="Pokemon Capture Game">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BROWSER ICON -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- CSS STYLE -->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/common.css") ?>" />

    <!-- JAVASCRIPT SCRIPT -->
    <script type="text/javascript">
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script type='text/javascript' src='<?= base_url("assets/js/script.js") ?>'></script>
</head>
<body>

<!-- HEADER: TITLE -->
<header>
	<div class="heroe">
		<h1>Pokemon Capture Game</h1>
		<h2>Choose the direction for "The Player" to take and see how many Pokemon you'll get!</h2>
	</div>
</header>

<!-- CONTENT -->
<section>
	<h1>Pick which direction would you like to go:</h1>

    <button type="button" class="btn btn-dark" name="direction" value="N">North</button>
    <button type="button" class="btn btn-dark" name="direction" value="E">East</button>
    <button type="button" class="btn btn-dark" name="direction" value="O">West</button>
    <button type="button" class="btn btn-dark" name="direction" value="S">South</button>

    <button type="button" class="btn btn-danger" name="reset">Reset</button>

    <br />
    <br />

    <span id="current-direction"></span>

    <br />
    <br />

    <button type="button" class="btn btn-primary" name="goDirection">
        Catch'em all!
    </button>

    <br />
    <br />

    <span id="movement-result"></span>

    <br />

</section>

<!-- FOOTER -->

<footer>
	<div class="copyrights">

		<p>
            <?= date('Y') ?> - Danielson Silva <br />
            <a href="https://github.com/DanielsonSilva" target="_blank">GitHub</a> <br />
            <a href="https://packagist.org/users/DanielsonSilva/packages/" target="_blank">Packagist</a> <br />
            <a href="https://www.linkedin.com/in/danielson-silva/" target="_blank">LinkedIn</a> <br />
        </p>

	</div>

</footer>

</body>
</html>
