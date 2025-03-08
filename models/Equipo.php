<?php
    require_once __DIR__ . "/../database/Database.php";
    
    class Equipo {
        private $db;

        public function __construct() {
            $this->db = Database::connect();
        }

        public function obtenerEquipos() {
            $sql = "SELECT * FROM equipo";
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function obtenerEquipo($id) {
            $sql = "SELECT * FROM equipo WHERE id = :id";
            $sentenciaPreparada = $this->db->prepare($sql);
            $sentenciaPreparada->execute(['id'=>$id]);
            return $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
        }

        public function crearEquipo($nombre, $ciudad, $deporte, $fecha_fundacion) {
            $sql = "INSERT INTO equipo (nombre, ciudad, deporte, fecha_fundacion) VALUES (:nombre, :ciudad, :deporte, :fecha_fundacion)";
            $sentenciaPreparada = $this->db->prepare($sql);
            $sentenciaPreparada->execute([
                'nombre'=>$nombre, 
                'ciudad'=>$ciudad, 
                'deporte'=>$deporte, 
                'fecha_fundacion'=>$fecha_fundacion
            ]);
            return $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
        }

        public function obtenerEquipoPorNombre($nombre){
            $sql = "SELECT id FROM equipo WHERE nombre = :nombre";
            $sentenciaPreparada = $this->db->prepare($sql);
            $sentenciaPreparada->execute(['nombre'=>$nombre]);
            return $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
        }

    }
?>