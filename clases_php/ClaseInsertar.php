<?php

require 'ClaseConexion.php';

class ClassInsertar{

    public function insertarRegistro($Region) {

        $objConexion = new ClassConexion();
        $objConexion->conectar();
        $this->conn = $objConexion->obtenerConexion();

        try {
            // $stmt = $this->conn->prepare("INSERT INTO personas (Nombre_Apellido, Alias, Rut, Email, Region, Comuna, Canal_1, Canal_2, Candidato) VALUES (:Nombre_Apellido, :Alias, :Rut, :Email, :Region, :Comuna, :Canal_1, :Canal_2, :Candidato)");
            $stmt = $this->conn->prepare("INSERT INTO personas (Region) VALUES (:Region)");
            
            // $stmt->bindParam(':Nombre_Apellido', $Nombre_Apellido);
            // $stmt->bindParam(':Alias', $Alias);
            // $stmt->bindParam(':Rut', $Rut);
            // $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Region', $Region);
            // $stmt->bindParam(':Comuna', $Comuna);
            // $stmt->bindParam(':Canal_1', $Canal_1);
            // $stmt->bindParam(':Canal_2', $Canal_2);
            // $stmt->bindParam(':Candidato', $Candidato);
            $stmt->execute();
            echo "Registro insertado correctamente";
        } catch(PDOException $e) {
            echo "Error al insertar el registro: " . $e->getMessage();
        }
        $objConexion->desconectar();
    }

}