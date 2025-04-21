<?php

namespace App\Models;

use Core\Model;

use PDO;

class FruitModel extends Model
{
    // Add a new row to the database
    public function addRow($name, $description)
    {
        $stmt = $this->db->prepare("INSERT INTO fruits (name, description) VALUES (:name, :description)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->execute();
    }

    // Search for a row in the database using its column value
    public function getRow($name)
    {
        $stmt = $this->db->prepare("SELECT * FROM fruits WHERE name = :name LIMIT 1");
        $stmt->bindValue(":name", $name);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?? null;
    }

    // Get all rows in the database
    public function getAllRows()
    {
        $stmt = $this->db->prepare("SELECT * FROM fruits");
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows ?? null;
    }

    // Check if the row already exists in the database
    public function rowAlreadyExists($name): bool
    {
        return (bool) $this->getRow($name);
    }

    // Check if the input is 3 to 30 characters long and contains only letters (from any language) or spaces.
    public function isValidInput($name): bool
    {
        $regex = '/^[\p{L}\s]{3,30}$/u';
        return preg_match($regex, $name);
    }
}