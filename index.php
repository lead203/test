<?php
	require "db.php";
?>

<?php if(isset($_SESSION['logged_user'])) : ?>
	�����������!
	<hr>
	<a href="/logout.php">�����</a>
<?php else : ?>
<a href="/login.php">�����������</a><br>
<a href="/signup.php">�����������</a>
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

