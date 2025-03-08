<?php
    require_once __DIR__ . "/../models/Equipo.php";

    class EquipoController {

        private $equipoModel;

        public function __construct() {
            $this->equipoModel = new Equipo();
        }

        public function listarEquipos() {
            return $this->equipoModel->obtenerEquipos();
        }

        public function listarEquipo($id) {
            return $this->equipoModel->obtenerEquipo($id);
        }

        public function creacionEquipo($datos) {
            $errores = [];
            if (strlen($datos['nombre'])<3 || strlen($datos['nombre'])>50){
                $errores[] = "El nombre del equipo debe tener entre 3 y 50 caracteres";
            }
            if (strlen($datos['ciudad'])<3 || strlen($datos['ciudad'])>50){
                $errores[] = "El ciudad del equipo debe tener entre 3 y 50 caracteres";
            }
            if (strtotime($datos['fecha_fundacion'])>time()){
                $errores[] = "La fecha de fundación no puede ser en el futuro";
            }
            var_dump($this->equipoModel->obtenerEquipoPorNombre($datos['nombre']));
            if ($this->equipoModel->obtenerEquipoPorNombre($datos['nombre']) !== false){
                $errores[] = "Ya existe un equipo con este nombre";
            }
            if (!empty($errores)) {
                return $errores;
            }
            return $this->equipoModel->crearEquipo($datos['nombre'], $datos['ciudad'], $datos['deporte'], $datos['fecha_fundacion']);
        }
    }
?>