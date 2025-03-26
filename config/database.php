<?php
class Database {
    public static function connect() {
        return new PDO('mysql:host=localhost;dbname=approval_system;charset=utf8mb4', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}