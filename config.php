<?php
$dbi = [
'host' => 'localhost',
'database' => 'zwik_dane',
'user' => 'zwik_zwik',
'password' => 'mjunior8!'];
//dane serwera sql

try {
$db = new PDO ("mysql:host={$dbi['host']}; dbname={$dbi['database']}; charset=UTF8", $dbi['user'], $dbi['password'],
[
PDO::ATTR_EMULATE_PREPARES=>false, 
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
}
catch (PDOException $error) {
	exit('koniec');
}
//łączenie z bazą sql za pomocą biblioteki PDO
?>