<?php
define('DB_HOST', 'localhost'); 
define('DB_USER', 'minthu');      
define('DB_PASS', '123456789');         
define('DB_NAME', 'QLHoa'); 
function getConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}



?>