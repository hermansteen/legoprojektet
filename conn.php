<?php
// conn.php upprättar en koppling mellan databasen och webbsidan
// definiera inställningar
$host   = 'mysql.itn.liu.se';
$user   = 'lego';
$pass   = '';
$db     = 'lego';

// skapa anslutningssträng
$dsn = "mysql:dbname=$db;host=$host;charset=utf8";

// inställningar
$settings = array(
        
        // hämta data som associativ array
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        
        // ge exception när det går fel
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

// skapa anslutningen och fånga fel
try {
    $dbm = new PDO($dsn, $user, $pass, $settings);    
} catch (PDOException $e) {
    echo "Kunde inte koppla mot db.<br>" . $e->getMessage();
    exit;
}