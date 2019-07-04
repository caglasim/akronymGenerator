<?php
// $databaseHost = 'localhost';
// $databaseName = 'DB3822854';
// $databaseUsername = 'U3822854';
// $databasePassword = 'XM9jCaqeC19061989'; 
// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$databaseHost = 'localhost';
$databaseName = 'demo';
$databaseUsername = 'test';
$databasePassword = '1234'; 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if($mysqli) {
    //in der nächsten Zeile kann // entfernt werden, um die Verbindung zu testen
// echo "Server-Verbindung erfolgreich, wähle Datenbank aus...";
}
else{
    echo "Verbindung falsch";
}
?>