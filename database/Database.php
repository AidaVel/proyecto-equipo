<?php
    require_once __DIR__ . "/../config/config.php";

    class Database {
        private static $connection = null;

        public static function connect() {
            if (self::$connection === null) {
                try {
                    self::$connection = new PDO (
                        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                    );
                }
                 catch (PDOException $e){
                    die("Error de conexion: ".$e->getMessage());
                }
            }
            return self::$connection;
        }
    }
?>