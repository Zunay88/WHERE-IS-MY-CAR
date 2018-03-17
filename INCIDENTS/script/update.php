<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['incidence'])) {

    require __DIR__ . '/library.php';

    $matricula = (isset($data['incidence']['matricula']) ? $data['incidence']['matricula'] : NULL);
    $descripcion = (isset($data['incidence']['descripcion']) ? $data['incidence']['descripcion'] : NULL);
    $deposito = (isset($data['incidence']['deposito']) ? $data['incidence']['deposito'] : NULL);
    $fecha = (isset($data['incidence']['fecha']) ? $data['incidence']['fecha'] : NULL);
    $estado = (isset($data['incidence']['estado']) ? $data['incidence']['estado'] : NULL);
    $incidence_id = (isset($data['incidence']['id']) ? $data['incidence']['id'] : NULL);

    // validations
    if ($matricula == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["La matrícula es obligatoria"]]);

    } else {

        // Update the Incidence
        $incidence = new Incidence();

        $incidence->Update($matricula, $descripcion, $deposito, $fecha, $estado, $incidence_id);
    }
}

?>
