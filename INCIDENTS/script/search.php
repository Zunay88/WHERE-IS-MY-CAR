<?php

    require __DIR__ . '/library.php';

    $matricula = (isset($data['search_incidence']['matricula']) ? $data['search_incidence']['matricula'] : NULL);

    $search_incidence = new Incidence();

    echo $search_incidence->Search($matricula);

?>
