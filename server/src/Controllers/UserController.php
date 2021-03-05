<?php

namespace BSHARE\WEBSERVER\CONTROLLERS;

use BSHARE\WEBSERVER\MODELS\Usuario;

use PDOException;
use Exception;

class RouterException extends Exception
{
}

$sql = [];

class UserController
{
    private Usuario $user;
    private array $sql;

    // public static function create()
    // {
    //     try {
    //         global $sql;
    //         global $db;

    //         $numberRandomCard = mt_rand(1000000, 9999999);
    //         $numberRandomUser = mt_rand(1000000, 9999999);
    //         $date = date("Y-m-d");

    //         $this->user = new Usuario(json_decode(file_get_contents('php://input')));
    //         $informationUser = $this->user->show();

    //         $sql[0] = "INSERT INTO tb_carrinho VALUE ($numberRandomCard, '$date');";
    //         $sql[1] = $db->prepare("INSERT INTO tb_usuario VALUE ($numberRandomUser, :frontCover, $numberRandomCard);");
    //         $sql[2] = $db->prepare("INSERT INTO tb_dados_usuario VALUE ($numberRandomUser, :fname, :fpassword, :email);");

    //         $db->exec($sql[0]);
    //         $sql[1]->execute(['frontCover' => $informationUser['arquivoCapa']]);
    //         $sql[2]->execute([
    //             'fname' => $informationUser['nome'],
    //             'fpassword' => $informationUser['senha'],
    //             'email' => $informationUser['email']
    //         ]);

    //         http_response_code(200);
    //     } catch (PDOException $e) {
    //         http_response_code(404);
    //         echo "Erro: " . $e->getMessage();
    //     }
    // }

    public static function showUsers()
    {
        return function () {
            global $db;
            global $sql;
            $users = [];

            $sql[1] = "SELECT 
            tb_usuario.cd_usuario, 
            tb_usuario.nm_arquivo_capa,
            tb_dados_usuario.nm_usuario,
            tb_dados_usuario.cd_senha,
            tb_dados_usuario.nm_email
             FROM tb_usuario
            JOIN tb_dados_usuario ON tb_usuario.cd_usuario = tb_dados_usuario.cd_usuario";

            foreach ($db->query($sql[1]) as $element) {
                array_push($users, [
                    'codigo' => $element['cd_usuario'],
                    'name' => $element['nm_usuario'],
                    'email' => $element['nm_email']
                ]);
            }

            echo json_encode($users);
        };
    }

    public static function showUser()
    {
        return function () {
            global $db;
            global $sql;
            global $url;

            $sql[0] = "SELECT 
            tb_usuario.cd_usuario,
            tb_usuario.nm_arquivo_capa,
            tb_dados_usuario.nm_usuario,
            tb_dados_usuario.nm_email
             FROM tb_usuario
            JOIN tb_dados_usuario ON tb_usuario.cd_usuario = tb_dados_usuario.cd_usuario";

            switch ($url[1]) {
                case "email":
                    $sql[0] .= " WHERE tb_dados_usuario.nm_email = '$url[2]'";
                    break;
                case "name":
                    $sql[0] .= " WHERE tb_dados_usuario.nm_usuario = '$url[2]'";
                    break;
                case "log-in":
                    $sql[0] = "SELECT nm_usuario, cd_senha FROM tb_dados_usuario WHERE tb_dados_usuario.nm_usuario = '$url[2]' AND tb_dados_usuario.cd_senha = '$url[3]'";

                    $rows = $db->exec($sql[0]);

                    if ($rows != 0) {
                        http_response_code(201);
                    } else {
                        http_response_code(406);
                    }
                    return;
                    break;
                default:
                    throw new RouterException("Erro na rota");
                    break;
            }

            $queryResult = $db->query($sql[0]);
            foreach ($queryResult as $element) {
                $user = [
                    'codigo' => $element['cd_usuario'],
                    'nome' => $element['nm_usuario'],
                    'email' => $element['nm_email']
                ];
            }

            echo json_encode($user);
        };
    }

    public static function update()
    {
    }
}
