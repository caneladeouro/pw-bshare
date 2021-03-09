<?php

namespace BSHARE\WEBSERVER\CONTROLLERS;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use PDOException;
use Exception;

class RouterException extends Exception
{
}

$sql = [];

/**
 * Controllers for user
 */
class UserController
{
    /**
     * Sign user with information of json
     */
    public function create(Request $req, Response $res, array $args)
    {
        global $db;

        $data = json_decode(file_get_contents('php://input'));

        // If exist name or email equal on database don't register user and applies an error
        if ($db->query("SELECT nm_usuario, nm_email FROM tb_dados_usuario WHERE nm_usuario = '$data->name' OR nm_email = '$data->email';")->rowCount() != 0) {
            // throw new Exception(["erro" => true, "message" => "Já existe um usuario com email ou nome iguais"]);

            $res = $res->withStatus(406);
            return $res;
        }

        $cardUUID = $this->v4();
        $userUUID = $this->v4();
        $date = str_replace("-", "/", date('Y-m-d'));

        $db->query("INSERT INTO tb_carrinho VALUE ('$cardUUID', '$date');");
        $db->query("INSERT INTO tb_usuario VALUE ('$userUUID', null, '$cardUUID')");
        $sql = $db->prepare("INSERT INTO tb_dados_usuario VALUE ('$userUUID', :name, :password, :email);");

        $sql->execute([
            "name" => $data->name,
            "password" => $data->password,
            "email" => $data->email
        ]);

        $res = $res->withStatus(201);
        $res->getBody()->write(json_encode($data));
        return $res;
    }

    // Show one user with informatin of json
    public function show(Request $req, Response $res, array $args)
    {
        global $db;

        $data = $args['data'];
        $sql = "SELECT 
        tb_dados_usuario.cd_usuario, 
        tb_dados_usuario.nm_usuario,
        tb_dados_usuario.nm_email FROM tb_dados_usuario WHERE 
        tb_dados_usuario.nm_usuario = '$data' OR
        tb_dados_usuario.nm_email = '$data' OR
        tb_dados_usuario.cd_usuario = '$data'";

        foreach ($db->query($sql) as $value) {
            $UserDataDatabase = [
                "code" => $value["cd_usuario"],
                "name" => $value['nm_usuario'],
                "email" => $value['nm_email']
            ];
        }

        if (isset($UserDataDatabase)) {
            $res = $res->withStatus(201);
            $res->getBody()->write(json_encode($UserDataDatabase));
        } else {
            $res = $res->withStatus(406);
        }

        return $res;
    }

    /**
     * Show all users
     */
    public function showAll(Request $req, Response $res, array $args)
    {
        global $db;

        $sql = "SELECT
        tb_dados_usuario.cd_usuario,
        tb_dados_usuario.nm_usuario,
        tb_dados_usuario.nm_email FROM tb_dados_usuario";

        $data = [];
        foreach ($db->query($sql) as $value) {
            array_push($data, [
                "code" => $value["cd_usuario"],
                "name" => $value['nm_usuario'],
                "email" => $value['nm_email']
            ]);
        }

        if ($data != []) {
            $res = $res->withStatus(201);
            $res->getBody()->write(json_encode($data));
        } else {
            $res = $res->withStatus(406);
        }

        return $res;
    }

    /**
     * Login user with name
     */
    public function logInWithName(Request $req, Response $res, array $args)
    {
        global $db;

        $name = $args['name'];
        $password = $args['password'];

        $sql = "SELECT tb_dados_usuario.nm_usuario FROM tb_dados_usuario WHERE 
        tb_dados_usuario.nm_usuario = '$name' AND
        tb_dados_usuario.cd_senha = '$password'";

        $rows = $db->query($sql)->rowCount();
        if ($rows != 0) {
            $res = $res->withStatus(201);
        } else {
            $res = $res->withStatus(406);
        }

        return $res;
    }

    /**
     * Login user with email
     */
    public function logInWithEmail(Request $req, Response $res, array $args)
    {
        global $db;

        $email = $args['email'];
        $password = $args['password'];

        $sql = "SELECT tb_dados_usuario.nm_usuario FROM tb_dados_usuario WHERE 
        tb_dados_usuario.nm_email = '$email' AND
        tb_dados_usuario.cd_senha = '$password'";

        $rows = $db->query($sql)->rowCount();
        if ($rows != 0) {
            $res = $res->withStatus(201);
        } else {
            $res = $res->withStatus(406);
        }

        return $res;
    }

    /**
     * Generate UUID code
     */
    private function v4()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}
