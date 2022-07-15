<?php

//include __DIR__ . "/../library/request.php";
//include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/users.php";

class LoginController
{
    public static function post(): void
    {
        try {
            $json = Request::json();
            $user = UserModel::getOneByEmail($json->email);

            if (!$user) {
                Response::json(400, [], ["success" => 0, "error" => "Bad request"]);
                return;
            }

            if (!password_verify($json->password, $user["password"])) {
                Response::json(400, [], ["success" => 0, "error" => "Bad request"]);
                return;
            }

            Response::json(200, [], ["success" => 1,
                                                "idUser" => $user["idUser"],
                                                "isCollector" => $user["isCollector"],
                                                "name" => $user["name"]]);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => 0, "error" => $exception->getMessage()]);
        } catch (Exception $e) {
        }
    }

}
