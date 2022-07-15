<?php

//include __DIR__ . "/../library/request.php";
//include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/ride.php";

class RideController
{
    public static function post(): void{
        try {
            $json = Request::json();

            if (!isset($json->idUser)) {
                Response::json(405, [], ["success" => 0, "error" => "Bad request"]);
                return;
            }

            $scooter = RideModel::getActiveRide($json->idUser);

            if (!$scooter) {
                Response::json(401, [], ["success" => 0, "error" => "Not found"]);
                return;
            }

            RideModel::setHsScooter($scooter["idScooter"]);


            Response::json(200, [], ["success" => 1]);

        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }

    public static function patch(): void
    {
        try {
            $json = Request::json();

            if (!isset($json->idUser)) {
                Response::json(400, [], ["success" => 0, "error" => "Bad request"]);
                return;
            }

            RideModel::updateOneById($json->idUser);

            Response::json(200, [], ["success" => 1]);

        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => 0, "error" => $exception->getMessage()]);
        } catch (Exception $e) {
        }
    }

}