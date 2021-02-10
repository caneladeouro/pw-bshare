<?php

namespace BSHARE\CONTROLLERS;

require __DIR__ . "/.." . "/Database" . "/ConnectionDatabase.php";
require __DIR__ . "/.." . "/Models" . "/Usuario.php";

use BSHARE\MODELS\Usuario;
// use BSHARE\CONNECTION_DATABASE;

use FFI\Exception;
use PDOException;
use PDO;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class UserController
{
    private Usuario $user;
    private array $sql;

    public function create()
    {
        try {
            global $db;

            $numberRandomCard = mt_rand(1000000, 9999999);
            $numberRandomUser = mt_rand(1000000, 9999999);
            $date = date("Y-m-d");

            $this->user = new Usuario(json_decode(file_get_contents('php://input')));
            $informationUser = $this->user->show();

            $this->sql[0] = "INSERT INTO tb_carrinho VALUE ($numberRandomCard, '$date');";
            $this->sql[1] = $db->prepare("INSERT INTO tb_usuario VALUE ($numberRandomUser, :frontCover, $numberRandomCard);");
            $this->sql[2] = $db->prepare("INSERT INTO tb_dados_usuario VALUE ($numberRandomUser, :fname, :fpassword, :email);");

            $db->exec($this->sql[0]);
            $this->sql[1]->execute(['frontCover' => $informationUser['arquivoCapa']]);
            $this->sql[2]->execute([
                'fname' => $informationUser['nome'],
                'fpassword' => $informationUser['senha'],
                'email' => $informationUser['email']
            ]);

            http_response_code(200);
        } catch (PDOException $e) {
            http_response_code(404);
            echo "Erro: " . $e->getMessage();
        }
    }

    public function showUsers()
    {
        try {
            global $db;
            $users = [];

            $this->sql[1] = "SELECT 
            tb_usuario.cd_usuario, 
            tb_usuario.nm_arquivo_capa,
            tb_dados_usuario.nm_usuario,
            tb_dados_usuario.cd_senha,
            tb_dados_usuario.nm_email
             FROM tb_usuario
            JOIN tb_dados_usuario ON tb_usuario.cd_usuario = tb_dados_usuario.cd_usuario";

            foreach ($db->query($this->sql[1]) as $element) {
                array_push($users, [
                    'codigo' => $element['cd_usuario'],
                    'name' => $element['nm_usuario'],
                    'email' => $element['nm_email']
                ]);
                // array_push($users, $element);
            }

            echo json_encode($users);
        } catch (PDOException $e) {
            http_response_code(404);
            echo "Erro: " . $e->getMessage();
        }
    }

    public function showUser()
    {
        try {
            global $db;
            $id = $_REQUEST['id'];

            $this->sql[0] = "SELECT 
            tb_usuario.cd_usuario,
            tb_usuario.nm_arquivo_capa,
            tb_dados_usuario.nm_usuario,
            tb_dados_usuario.cd_senha,
            tb_dados_usuario.nm_email
             FROM tb_usuario
            JOIN tb_dados_usuario ON tb_usuario.cd_usuario = tb_dados_usuario.cd_usuario
            WHERE tb_usuario.cd_usuario = $id";

            foreach ($db->query($this->sql[0]) as $element) {
                $user = [
                    'codigo' => $element['cd_usuario'],
                    'name' => $element['nm_usuario'],
                    'senha' => $element['cd_senha'],
                    'email' => $element['nm_email']
                ];
            }

            echo json_encode($user);
        } catch (PDOException $e) {
        }
    }

    public function update()
    {
        try {
        } catch (PDOException $e) {
        }
    }
}
