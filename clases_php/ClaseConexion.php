<?php

class ClassConexion {

    public function conectar() {
        $this->servername = "localhost";
        $this->databasename = "sistemavotacion";
        $this->username = "root";
        $this->password = "";

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->username, $this->password);
            // Establecer el modo de error de PDO a excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<br>Conexión exitosa<br>";
        } catch(PDOException $e) {
            echo "<br>Conexión fallida: " . $e->getMessage();
        }
    }

    public function desconectar() {
        $this->conn = null;
        echo "<br>Conexión cerrada";
    }

    public function obtenerConexion() {
        return $this->conn;
    }

}

?>
