<?php

require 'ClaseConexion.php';

class Consultar{

    public function consultarRegiones() {

        $objConexion = new ClassConexion();
        $objConexion->conectar();
        $this->conn = $objConexion->obtenerConexion();

        try {
            $stmt = $this->conn->prepare("SELECT * FROM regiones");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                // Acceder a cada campo por su nombre
                $nombre = $row['Nombre_region'];
                
                echo "<option value='".$nombre."'>".$nombre."</option>";
            }

            echo "Datos devueltos correctamente";
        } catch(PDOException $e) {
            echo "Error al consultar los registros: " . $e->getMessage();
        }
        $objConexion->desconectar();
    }

    public function consultarComunas($region){

        $objConexion = new ClassConexion();
        $objConexion->conectar();
        $this->conn = $objConexion->obtenerConexion();

        try {
            $stmt = $this->conn->prepare
            (
               "SELECT comunas.Nombre_comuna
                FROM comunas
                JOIN regiones ON regiones.ID_region = comunas.ID_region
                WHERE regiones.Nombre_region = :region
            ");
            $stmt->bindParam(':region', $region);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                // Acceder a cada campo por su nombre
                $nombre = $row['Nombre_comuna'];
                
                echo "<option name='region' value='".$nombre."'>".$nombre."</option>";
            }

            echo "Datos devueltos correctamente";
        } catch(PDOException $e) {
            echo "Error al consultar los registros: " . $e->getMessage();
        }
        $objConexion->desconectar();

    }

    public function consultarCandidatos() {

        $objConexion = new ClassConexion();
        $objConexion->conectar();
        $this->conn = $objConexion->obtenerConexion();

        try {
            $stmt = $this->conn->prepare("SELECT * FROM candidatos");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row) {
                // Acceder a cada campo por su nombre
                $nombre = $row['nombre_candidato'];
                // imprimir
                echo "<option value='".$nombre."'>".$nombre."</option>";
            }

            echo "Datos devueltos correctamente";
        } catch(PDOException $e) {
            echo "Error al consultar los registros: " . $e->getMessage();
        }
        $objConexion->desconectar();
    }
}


?>