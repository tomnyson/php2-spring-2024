<?php

namespace Controllers;

use Models\CarModel;

class CarController
{
    public function list()
    {
        $carModel = new CarModel();
        $queryParams = $_GET;


        if (!empty($queryParams)) {
            $cars = $carModel->getFilteredCars($queryParams);
        } else {
            $cars = $carModel->getAll();
        }

        $jsonData = json_encode($cars);

        header('Content-Type: application/json');
        echo $jsonData;
    }
}
