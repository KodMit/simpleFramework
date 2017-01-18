<?php
/**
* UserClass
*/
class User
{
	function __construct()
	{
		include('database.php');
		$bdd->query('CREATE TABLE IF NOT EXISTS `users` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `login` varchar(60) NOT NULL,
					  `pass` varchar(100) NOT NULL,
					  `salt` varchar(100) NOT NULL,
					  `email` varchar(150) NOT NULL,
					  `regdate` varchar(50) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');
	}

	public function get($value, $name){
		include('database.php');
		$info = $bdd->query('SELECT * FROM users WHERE login = "'.$name.'"');
		$r = $info->fetch();
		return $r[$value];
	}

	public function userExist($value, $name){
		include('database.php');
		$verif = $bdd->query('SELECT * FROM users WHERE '.$value.' = "'.$name.'"');
		$count = $verif->rowCount();
		if ($count >= 1) {
			return true;
		}
		else{
			return false;
		}
	}

	public function addUser($name, $pass, $email){
		include('database.php');
		$name = htmlspecialchars($name);
		$pass = htmlspecialchars($pass);
		$email = htmlspecialchars($email);

		$salt = sha1(rand(1, 60));
		$encryptedPass = sha1("This".$pass."Is".$salt."Spartaaa");

		if(strlen($pass) <= 5){
			return "passTooSmall";
		}
		if ($this->userExist("login", $name)) {
			return "nameAlreadyExist";
		}
		if ($this->userExist("email", $email)) {
			return "emailAlreadyExist";
		}
		else{
			$req = $bdd->prepare('INSERT INTO users(login, pass, salt, email, regdate) VALUES(:login, :pass, :salt, :email, :regdate)');
			$req->execute(array(
				'login' => $name,
				'pass' => $encryptedPass,
				'email' => $email,
				'salt' => $salt,
				'regdate' => date('d-m-y')
			));
			return true;
		}
	}

	public function updateUser($pUser, $pRow, $pNewValue){
		include('database.php');
		$user = htmlspecialchars($pUser);
		$row = htmlspecialchars($pRow);
		$newValue = htmlspecialchars($pNewValue);

		if ($this->userExist($row, $newValue)) {
			return $row." value already exist";
		}
		else{
			$bdd->query('UPDATE users SET '.$row.' = "'.$newValue.'" WHERE login = "'.$user.'"');
		}
	}

	public function removeUser($pUser){
		include('database.php');
		$user = htmlspecialchars($pUser);
		$bdd->query('DELETE FROM users WHERE login = "'.$user.'"');
	}

}