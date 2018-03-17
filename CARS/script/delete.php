<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['car'])) {

    require __DIR__ . '/library.php';

    $matricula = (isset($data['car']['matricula']) ? $data['car']['matricula'] : NULL);

    // Delete the Car
    $car = new Car();

    $car->Delete($matricula);
}

?>
