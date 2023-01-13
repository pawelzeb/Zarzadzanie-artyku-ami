<?php
session_save_path("/tmp");
session_start();

$dbi =include('config.php');
echo ' <html><head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head></html> ';


if (isset($_POST['login_in'])) {
	$login = $_POST['login'];				
	$haslo = md5($_POST['haslo']);
	
	$uzytkownicy = $db->Prepare('SELECT * FROM `uzytkownicy` WHERE `login` = :login');
	$uzytkownicy -> bindParam(":login", $login, PDO::PARAM_STR);
	$uzytkownicy -> Execute(); 
	$uzytkownicy = $uzytkownicy->fetch(PDO::FETCH_ASSOC);
	if(empty($uzytkownicy)) {
		header("Location: admin.php?error=3");
		exit;
	}
	
	if($haslo != $uzytkownicy['haslo']) {
		header("Location: admin.php?error=5");
		exit;
	}
	
	if($uzytkownicy['klucz'] != "active") {
		header("Location: admin.php?error=6");
		exit;
	}
	
		echo 'fds'.$uzytkownicy['id'];
	
	$_SESSION['user_id'] = $uzytkownicy['id'];
		header("Location: admin.php?successful=4");	
		exit;
	}
	
	if(isset($_POST['reset_password'])) {
	if (!isset($_POST['login'])|| empty($_POST['login'])) {
		header("Location: admin.php?error=4");
		exit;
	}	
	
	$uzytkownik = $_POST['login'];
	$access_token = mt_rand();
	print_r($uzytkownik);
	$reset = $db -> Prepare("UPDATE `uzytkownicy` SET `access_token` = :access_token WHERE `login` LIKE :login");
	$reset -> bindParam(':access_token', $access_token, PDO::PARAM_STR);
	$reset -> bindParam(':login', $uzytkownik, PDO::PARAM_STR);
	$reset -> Execute();
	
	$mlogin = str_replace('.', ' ', $login);
$mlogin = explode("@", $mlogin);
$mlogin = ucwords($mlogin[0]);

$email_template = "email_reset_password_template.html";
$wiadomosc = '<html><body>'.file_get_contents($email_template);
$wiadomosc = str_replace("[mlogin]", $uzytkownik, $wiadomosc);
$wiadomosc = str_replace("[key]", $access_token, $wiadomosc);
$wiadomosc = str_replace("[url]", "a href=" . $_SERVER['HTTP_HOST'] . 'reset_password.php', $wiadomosc);


$naglowki = 'From: piksell2@gmail.com' . "\r\n" .
			'Reply-To: piksell2@gmail.com' . "\r\n" .
			'Content-Type: text/html; charset=utf-8' . "\r\n";

mail($uzytkownik, "Resetowanie hasła - ZWiK Jawor", $wiadomosc, $naglowki);
	
		header("Location: admin.php?successful=5");
		exit;
	}
	
	if(isset($_GET['logout'])) {
		session_destroy();
		header("Location: admin.php?error=4");
		exit;
	}
	
	if(isset($_POST['change_pass'])) {
		$key = $_POST['access_token'];
		$reset = $db -> Prepare('SELECT `access_token` FROM `uzytkownicy` WHERE `access_token` = :access_token');
		$reset -> bindParam(':access_token', $key, PDO::PARAM_INT);
		//$reset -> bindParam(':login', $_POST['login'], PDO::PARAM_STR);
		$reset -> Execute();
		if($reset -> rowCount() > 0) {
		if($_POST['haslo'] != $_POST['haslo2']) {
			header('Location reset_password.php?error=1&access_token=' . $key);
			exit;
	}
		
		$reset = $db -> Prepare('UPDATE `uzytkownicy` SET `haslo` = :haslo WHERE `login` = :login');
		$reset -> bindParam(':haslo', md5($_POST['haslo']), PDO::PARAM_STR);
		$reset -> bindParam(':login', $_POST['login'], PDO::PARAM_STR);
		$reset -> Execute();
		
		header('Location: admin.php?successful=6');
		exit;
		}
		echo $reset -> rowCount();
		echo $_POST['login'];
		echo $_POST['haslo'];
		//header('Location: admin.php?error=4');
		exit;
	}

	if(isset($_GET['activate'])) {
		$key = $_GET['activate'];
	$uzytkownicy = $db->Prepare('SELECT `klucz` FROM `uzytkownicy` WHERE `klucz` = :klucz');
	$uzytkownicy -> bindParam(":klucz", $key, PDO::PARAM_STR);
	$uzytkownicy -> Execute();
	//$uzytkownik = $uzytkownicy->fetch(PDO::FETCH_ASSOC);	
	if(empty($uzytkownicy)) {
		header("Location: admin.php?error=3");
		exit;
	}
		/*
	$uzytkownicy = $uzytkownicy->fetch(PDO::FETCH_ASSOC);	
	if(uzytkownicy['klucz'] == "active") {
		header("Location: admin.php?successful=1");
		exit;
	}
	*/
	$db->Exec('UPDATE `uzytkownicy` SET `klucz` = "active" WHERE `klucz` = "'.$key.'"');
	header("Location: admin.php?successful=1");
		exit;
	}	


if (isset($_POST['register'])) {
		$login = $_POST['login'];	
	$haslo = md5($_POST['haslo']);		
	$haslo2 = md5($_POST['haslo2']);	
	$klucz = md5(mt_rand());
	
	if (empty($_POST['login'] || empty($_POST['haslo'] || empty($_POST['haslo2'])))) {
		header("Location: admin.php?error=0");
		exit;
		}	

if ($haslo != $haslo2) {
header("Location: admin.php?error=1");
exit;
}

$zajetty_login = $db->Prepare('SELECT * FROM `uzytkownicy` WHERE `login` = :login');
$zajetty_login -> bindParam(":login", $login, PDO::PARAM_STR);
$zajetty_login -> Execute();
$zajetty_login  = $zajetty_login -> fetchAll();

/*
$uzytkownicy = $db->Prepare('SELECT `login` FROM `uzytkownicy` WHERE `login` = :login');
$uzytkownicy = $uzytkownicy->fetchAll();
*/
if(!empty($zajetty_login)) {
	header("Location: admin.php?error=2");
	exit;
}

$db->Exec('INSERT INTO `uzytkownicy` VALUES ("", "' .$access_token. '", "' .$login. '", "' .$haslo. '","' .$klucz. '")');


$mlogin = str_replace('.', ' ', $login);
$mlogin = explode("@", $mlogin);
$mlogin = ucwords($mlogin[0]);

$email_template = "email_activation_template.html";
$wiadomosc = '<html><body>'.file_get_contents($email_template);
$wiadomosc = str_replace("[mlogin]", $mlogin, $wiadomosc);
$wiadomosc = str_replace("[key]", $klucz, $wiadomosc);
$wiadomosc = str_replace("[url]", "a href=" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], $wiadomosc);


$naglowki = 'From: piksell2@gmail.com' . "\r\n" .
			'Reply-To: piksell2@gmail.com' . "\r\n" .
			'Content-Type: text/html; charset=utf-8' . "\r\n";

mail($login, "Aktywacja konta dla pracownika ZWiK Jawor", $wiadomosc, $naglowki);

header("Location: admin.php?successful=0&email=".$login);
exit;
}

?>
