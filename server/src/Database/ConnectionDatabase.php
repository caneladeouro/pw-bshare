<?php

namespace BSHARE\WEBSERVER\CONNECTION_DATABASE;

use PDO;
use PDOException;

function returnDatabaseInstance()
{
    $host = getenv("MYSQL_HOST");
    $user = getenv("MYSQL_USER");
    $pass = getenv("MYSQL_PASSWORD");
    $dbName = getenv("MYSQL_DB");

    return new PDO(
        "mysql:host=$host;dbname=$dbName",
        $user,
        $pass
    );
}

try {
    $db = returnDatabaseInstance();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
