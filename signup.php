<?php
	require "db.php";

	$data = $_POST;
	if( isset($data['do_signup'])){
		$errors = array();
		if(trim($data['login'] == '')){
			$errors[] = '������� �����!';
		}

		if(trim($data['email'] == '')){
			$errors[] = '������� email!';
		}

		if($data['password'] == ''){
			$errors[] = '������� ������!';
		}

		if($data['password_2'] != $data['password']){
			$errors[] = '��������� ������ ������ �� �����!';
		}

		if(R::count('users', "login = ?", array($data['login'])) > 0){
			$errors[] = '������������ � ����� ������� ��� �����������!';
		}

		if(R::count('users', "email = ?", array($data['email'])) > 0){
			$errors[] = '������������ � ����� email ��� �����������!';
		}

		if (empty($errors)){
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style ="color: green;">�� ������� ����������������!</div><hr>';
		}
		else{
			echo '<div style ="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
?>

<form action="/signup.php" method="POST">
	
	<p>
		<p><strong>��� �����</strong>:</p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>��� Email</strong>:</p>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>

	<p>
		<p><strong>��� ������</strong>:</p>
		<input type="password" name="password">
	</p>

	<p>
		<p><strong>������� ��� ������ ��� ���</strong>:</p>
		<input type="password" name="password_2">
	</p>

	<p>
		<button type="submit" name="do_signup">������������������</button>
	</p>

</form>