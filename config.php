<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'letscode');
 


//define('DB_SERVER', 'mysql-letscode.alwaysdata.net');
//define('DB_USERNAME', 'letscode');
//define('DB_PASSWORD', 'L3tSC0.De');
//define('DB_NAME', 'letscode_sae3');



/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    //$pdo = new PDO('mysql:host=mysql-letscode.alwaysdata.net;dbname=letscode_sae3','lestcode_admin','@DM1n/Lom');

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
