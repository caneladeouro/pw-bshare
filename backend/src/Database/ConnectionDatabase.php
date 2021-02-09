<?php

namespace BSHARE\CONNECTION_DATABASE;

use PDO;
use PDOException;
use PDOStatement;

$user = "CANELA";
$pass = "";

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=bd_bshare_22012020', $user, $pass);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
