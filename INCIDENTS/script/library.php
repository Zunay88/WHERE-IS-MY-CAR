<?php

require __DIR__ . '/database_connection.php';

/**
 * Class Incidence
 */
class Incidence
{

    /**
     * @var mysqli|PDO|string
     */
    protected $db;

    /**
     * Incidence constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }

    /**
     * Add new Incidence
     *
     * @param $matricula
     * @param $descripcion
     *
     * @return string
     */
    public function Create($matricula, $descripcion, $deposito, $fecha, $estado)
    {
        $query = $this->db->prepare("INSERT INTO incidents(matricula, descripcion, deposito, fecha, estado) VALUES (:matricula,:descripcion,:deposito,:fecha,:estado)");
        $query->bindParam("matricula", $matricula, PDO::PARAM_STR);
        $query->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
        $query->bindParam("deposito", $deposito, PDO::PARAM_STR);
        $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
        $query->bindParam("estado", $estado, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['incidence' => [
            'matricula'        => $matricula,
            'descripcion' => $descripcion,
            'deposito' => $deposito,
            'fecha' => $fecha,
            'estado' => $estado,

        ]]);
    }

    /**
     * List Incidents
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM incidents ORDER BY fecha");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['incidents' => $data]);
    }

    /*Search incidence*/

    public function Search($matricula)
    {
      //$query = $this->db->prepare("SELECT * FROM incidents WHERE matricula = '8042FCB'");
        $query = $this->db->prepare("SELECT * FROM incidents WHERE matricula = '$matricula'");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['search_incidents' => $data]);
    }

    /**
     * Update Incidence
     *
     * @param $matricula
     * @param $descripcion
     * @param $incidence_id
     */
    public function Update($matricula, $descripcion, $deposito, $fecha, $estado, $incidence_id)
    {
        $query = $this->db->prepare("UPDATE incidents SET matricula = :matricula, descripcion = :descripcion, fecha = :fecha, deposito = :deposito, estado = :estado WHERE id = :id");
        $query->bindParam("matricula", $matricula, PDO::PARAM_STR);
        $query->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
        $query->bindParam("deposito", $deposito, PDO::PARAM_STR);
        $query->bindParam("fecha", $fecha, PDO::PARAM_STR);
        $query->bindParam("estado", $estado, PDO::PARAM_STR);
        $query->bindParam("id", $incidence_id, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Incidence
     *
     * @param $incidence_id
     */
    public function Delete($incidence_id)
    {
        $query = $this->db->prepare("DELETE FROM incidents WHERE id = :id");
        $query->bindParam("id", $incidence_id, PDO::PARAM_STR);
        $query->execute();
    }
}
