<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['incidence'])) {

    require __DIR__ . '/library.php';

    $incidence_id = (isset($data['incidence']['id']) ? $data['incidence']['id'] : NULL);

    // Delete the Incidence
    $incidence = new Incidence();

    $incidence->Delete($incidence_id);
}

?>
