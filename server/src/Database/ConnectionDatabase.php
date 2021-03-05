<?php

namespace BSHARE\WEBSERVER\CONNECTION_DATABASE;

use PDO;
use PDOException;

function returnDatabaseInstance () {
    $user = getenv("MYSQL_USER");
    $pass = getenv("MYSQL_PASSWORD");
    $dbName = getenv("MYSQL_DB");
    $port = getenv("MYSQL_PORT");

    return new PDO(
        "mysql:host=127.0.0.1;dbname=$dbName;port=$port",
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
