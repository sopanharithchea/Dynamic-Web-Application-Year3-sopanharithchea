<?php
// Start the session
session_start();

define('TITLE', 'Main Page');
// Include the header:
include('templates/header.html');
// Leave the PHP section to display lots of HTML:
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Welcome to the Index Page!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
			nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			deserunt mollit anim id est laborum.</p><a class="btn btn-primary btn-lg" href="books.php" role="button">Learn more &raquo;</a></p>
	</div>
</div>



<?php // Return to PHP.
include('templates/footer.html'); // Include the footer.
?>