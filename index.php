<?php
	require "db.php";
?>

<?php if(isset($_SESSION['logged_user'])) : ?>
	Авторизован!
	<hr>
	<a href="/logout.php">Выйти</a>
<?php else : ?>
<a href="/login.php">Авторизация</a><br>
<a href="/signup.php">Регистрация</a>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Cook Book</title>
</head>
<body>

</body>
</html>

