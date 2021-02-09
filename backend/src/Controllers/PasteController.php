<?php

namespace BSHARE\CONTROLLERS;

require __DIR__ . "/.." . "/Database" . "/ConnectionDatabase.php";

use PDOException;
use PDO;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class PasteController
{
    private array $sql;

    public function addPaste()
    {
        try {
            global $db;
            $id = $_REQUEST['id'];

            $numberRandomPaste = mt_rand(1000000, 9999999);


            $this->sql[0] = "INSERT INTO tb_pasta VALUES ($numberRandomPaste, )";
        } catch (PDOException $e) {
        }
    }
}
