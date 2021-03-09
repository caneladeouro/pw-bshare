<?php

namespace BSHARE\FRONTEND\VALIDATE_AND_INIT_SESSION;

class Validate
{
    /**
     * Checks login and init session
     */
    public static function validateAndInitSession()
    {
        $host = getenv('WEBSERVER_HOST');
        $userOurEmail = $_POST['usuario-email'];
        $password = $_POST['senha'];
        $asEmail = false;

        if (filter_var($userOurEmail, FILTER_VALIDATE_EMAIL)) {
            $asEmail = true;
        }

        $callWebserver = curl_init();

        // check if you have to use email or name in the request
        if ($asEmail) {
            curl_setopt($callWebserver, CURLOPT_URL, "http://$host/user/logIn/email/$userOurEmail/$password");
        } else {
            curl_setopt($callWebserver, CURLOPT_URL, "http://$host/user/logIn/name/$userOurEmail/$password");
        }

        // curl_setopt($callWebserver, CURLOPT_HEADER, true);
        curl_setopt($callWebserver, CURLOPT_NOBODY, true);

        curl_exec($callWebserver);

        if (curl_errno($callWebserver)) {
            die('Houve um erro ao fazer a requisição ao servidor');
        }

        $httpResponseCode = curl_getinfo($callWebserver, CURLINFO_HTTP_CODE);
        curl_close($callWebserver);

        // Check the status of the session and if there is no create new session
        if ($httpResponseCode == 201) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();

                $ch = curl_init("http://$host/user/$userOurEmail");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = json_decode(curl_exec($ch));


                $_SESSION['user'] = $result;
                header('location: /site/layout');
            }
        } else {
            require __DIR__ . "/pages" . "/login.php";
        }
    }

    /**
     * Register user
     */
    public static function registerUser()
    {
        $host = getenv('WEBSERVER_HOST');
        $name = $_POST['usuario'];
        $password = $_POST['senha'];
        $email = $_POST['email'];
        $data = json_encode(["name" => $name, "password" => $password, "email" => $email]);

        // Set information request
        $ch = curl_init("http://$host/user");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();

            $ch = curl_init("http://$host/user/$name");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = json_decode(curl_exec($ch));

            $_SESSION['user'] = $result;
            header('location: /site/layout');
        }
    }

    public static function initSession($uri)
    {
        $host = getenv('WEBSERVER_HOST');

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();

            $ch = curl_init("http://$host$uri");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = json_decode(curl_exec($ch));

            $_SESSION['user'] = $result;
            header('location: /site/layout');
        }
    }
}
