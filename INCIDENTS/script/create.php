<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['incidence'])) {

    require __DIR__ . '/library.php';

    $matricula = (isset($data['incidence']['matricula']) ? $data['incidence']['matricula'] : NULL);
    $descripcion = (isset($data['incidence']['descripcion']) ? $data['incidence']['descripcion'] : NULL);
    $deposito = (isset($data['incidence']['deposito']) ? $data['incidence']['deposito'] : NULL);
    $fecha = (isset($data['incidence']['fecha']) ? $data['incidence']['fecha'] : NULL);
    $estado = (isset($data['incidence']['estado']) ? $data['incidence']['estado'] : NULL);

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

    } else if ($result == 0 ){
        http_response_code(400);
        echo json_encode(['errors' => ["El coche no existe, debe registrarlo primero"]]);

    } else {

        // Add the task
        $incidence = new Incidence();
        echo $incidence->Create($matricula, $descripcion, $deposito, $fecha, $estado);
    }
}
?>
