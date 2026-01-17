<?php

require_once 'database.php';

class Settings {
    private $conn;
    private $table = "settings";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getSetting($key) {
        $query = "SELECT value FROM " . $this->table . " WHERE setting_key = :key LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":key", $key);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['value'];
        }
        return null;
    }

    public function updateSetting($key, $value) {
        $query = "UPDATE " . $this->table . " SET value = :value WHERE setting_key = :key";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":key", $key);
        $stmt->bindParam(":value", $value);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAllSettings() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $settings = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $settings[$row['setting_key']] = $row['value'];
        }
        return $settings;
    }
}
