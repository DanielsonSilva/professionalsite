<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dice Roller</title>
	<meta name="description" content="The dice roller for your rolls">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BROWSER ICON -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
		<h1>Welcome to the Dice Roller</h1>
		<h2>Choose the dice and let the destiny decide your fate</h2>
	</div>
</header>

<!-- CONTENT -->
<section>
	<h1>Pick which dice would you roll:</h1>

    <button type="button" class="btn btn-dark" name="die" value="4">d4</button>
    <button type="button" class="btn btn-dark" name="die" value="6">d6</button>
    <button type="button" class="btn btn-dark" name="die" value="8">d8</button>
    <button type="button" class="btn btn-dark" name="die" value="10">d10</button>
    <button type="button" class="btn btn-dark" name="die" value="12">d12</button>
    <button type="button" class="btn btn-dark" name="die" value="20">d20</button>

    <button type="button" class="btn btn-danger" name="reset">Reset</button>

    <br />

    <span id="current-roll"></span>

    <br />

    <button type="button" class="btn btn-primary" name="roll">
        Roll that dice!
    </button>

    <br />

    <span id="roll-result"></span>

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
