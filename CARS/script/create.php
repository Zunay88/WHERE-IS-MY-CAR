<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['car'])) {

    require __DIR__ . '/library.php';

    $matricula = (isset($data['car']['matricula']) ? $data['car']['matricula'] : NULL);
    $marca = (isset($data['car']['marca']) ? $data['car']['marca'] : NULL);
    $modelo = (isset($data['car']['modelo']) ? $data['car']['modelo'] : NULL);
    $color = (isset($data['car']['color']) ? $data['car']['color'] : NULL);

    $servername = "localhost";
    $username = "cars";
    $password = "123456";
    $dbname = "cars";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM cars WHERE matricula = '$matricula'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    mysqli_close($conn);

    // validated the request
    if ($matricula == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["La matrícula es obligatoria"]]);

    } else if ($result == 1 ){
        http_response_code(400);
        echo json_encode(['errors' => ["Esta matrícula ya existe"]]);

    } else {

        // Add the car
        $car = new Car();
        echo $car->Create($matricula, $marca, $modelo, $color);
    }
}
?>
