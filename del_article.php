
<?php
session_save_path("/tmp");
session_start();
require_once('config.php');
//start sesji  - dane formularzy
//załadowanie danych konfiguracyjnych

if(isset($_SESSION['user_id'])) {

$id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        $sql = $db -> Prepare('DELETE FROM artykulyprojekt WHERE id = :id');
		$sql->bindParam( ':id', $id );
        $sql->execute();
       header( 'location: https://zwikjawor.pl/projekt/admin.php#spis-artyku%C5%82%C3%B3w' );
	   exit;
}
// jeżeli istnieje sesja użytkownika, zapytanie usuwa dane konkretnego rekordu (po id), po czym przekierowuje do określonej lokalizacji
?>
