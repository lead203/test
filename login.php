<?php
	require "db.php";

	$data = $_POST;
	if(isset($data['do_login'])){
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if($user){
			if(password_verify($data['password'], $user->password)){
				$_SESSION['logged_user'] = $user;
				echo '<div style ="color: green;">�� ������������!<br/>������ ������� �� <a href="/">�������</a> ��������!</div><hr>';
			}
			else{
				$errors[] = '�������� ������!';
			}
		}else{
			$errors[] = '������������ � ����� ������� �� ������!';
		}

		if(!empty($errors)){
			echo '<div style ="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
?>

<form action="login.php" method="POST">
	
	<p>
		<p><strong>�����</strong>:</p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>������</strong>:</p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>

	<p>
		<button type="submit" name="do_login">�����</button>
	</p>

</form>