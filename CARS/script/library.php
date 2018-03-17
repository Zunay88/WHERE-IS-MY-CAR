<?php

require __DIR__ . '/database_connection.php';

/**
 * Class Car
 */
class Car
{

    /**
     * @var mysqli|PDO|string
     */
    protected $db;

    /**
     * Car constructor.
     */
    public function __construct()
    {
        $this->db = DB();
    }

    /**
     * Add new Car
     *
     * @param $matricula
     * @param $marca
     *
     * @return string
     */
    public function Create($matricula, $marca, $modelo, $color)
    {
        $query = $this->db->prepare("INSERT INTO cars(matricula, marca, modelo, color) VALUES (:matricula,:marca,:modelo,:color)");
        $query->bindParam("matricula", $matricula, PDO::PARAM_STR);
        $query->bindParam("marca", $marca, PDO::PARAM_STR);
        $query->bindParam("modelo", $modelo, PDO::PARAM_STR);
        $query->bindParam("color", $color, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['car' => [
            'matricula'          => $matricula,
            'marca'        => $marca,
            'modelo' => $modelo,
            'color' => $color,
        ]]);
    }

    /**
     * List Cars
     *
     * @return string
     */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM cars ORDER BY matricula");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['cars' => $data]);
    }


    /**
     * Update Car
     *
     * @param $marca
     * @param $modelo
     * @param $matricula
     */
    public function Update($marca, $modelo, $color, $matricula)
    {
        $query = $this->db->prepare("UPDATE cars SET marca = :marca, modelo = :modelo, color = :color WHERE matricula = :matricula");
        $query->bindParam("marca", $marca, PDO::PARAM_STR);
        $query->bindParam("modelo", $modelo, PDO::PARAM_STR);
        $query->bindParam("color", $color, PDO::PARAM_STR);
        $query->bindParam("matricula", $matricula, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * Delete Car
     *
     * @param $matricula
     */
    public function Delete($matricula)
    {
        $query = $this->db->prepare("DELETE FROM cars WHERE matricula = :matricula");
        $query->bindParam("matricula", $matricula, PDO::PARAM_STR);
        $query->execute();
    }

    /*Search car*/

    public function Search($matricula)
    {
        $query = $this->db->prepare("SELECT * FROM cars WHERE matricula = :matricula");
        $query->bindParam("matricula", $matricula, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['cars' => $data]);
    }

}
