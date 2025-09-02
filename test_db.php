<?php
require 'config/db.php';
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
echo "Connection successful! Users count: " . count($users);
?>