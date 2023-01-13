<?php  

require_once('config.php');
session_save_path("/tmp");
session_start();
//załadowanie danych konfiguracyjnych
//start sesji  - dane formularzy

$data=date("Y-m-d H:i:s");
$submit2 = $_POST['submit2'];
$tytul = $_POST['tytul'];
$tekst = $_POST['tekst'];
//deklaracja zmiennych 

if(isset($_SESSION['user_id'])) {
if (isset($submit2)) {
	echo $tytul;
$sql = $db -> Prepare('INSERT INTO artykulyprojekt VALUES("", :user_id, :data, :tytul, :tekst)');
				$sql -> bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
				$sql -> bindParam(':tytul', $tytul, PDO::PARAM_STR);
				$sql -> bindParam(':tekst', $tekst, PDO::PARAM_STR);
				$sql -> bindParam(':data', $data, PDO::PARAM_INT);
$sql -> execute(); 
header( 'location: https://zwikjawor.pl/projekt/admin.php' );
}
}
else {
	"zaloguj się";
}
//sprawdzenie czy istnieje sesja użytkownika,czy button aktywny i dodanie zapytania z danymi rekordami
//jeżeli nie istnieje sesja użytkownika, to wyświetli "Zaloguj się"
