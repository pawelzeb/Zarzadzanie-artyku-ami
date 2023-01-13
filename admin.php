<?php

session_save_path("/tmp");
session_start();
//start sesji  - dane formularzy

$config= include "config.php";
// załadowanie pliku z danymi do połączenia z bazą SQL

if(isset($_SESSION['user_id']))
	include "panel.php";
	else
		include "login_page.php";
//sprawdzenie czy istnieje sesja użytkownika, jeżeli jest, to zostaje załadowany plik z panelem administracyjnym, jeżeli nie, to zostaje załadowany plik strony do logowania	
?>
</body>

