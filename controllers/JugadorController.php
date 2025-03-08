<!-- Controlador de jugador -->
<?php
    require_once __DIR__ . "/../models/Jugador.php";

    class JugadorController {

        private $jugadorModel;

        public function __construct() {
            $this->jugadorModel = new Jugador();
        }

        public function listarJugadores($equipo_id){
            return $this->jugadorModel->obtenerJugadoresPorEquipo($equipo_id);
        }

        public function listarJugador($id){
            return $this->jugadorModel->obtenerJugador($id);
        }

        public function eliminandoJugador($id){
            if ($this->jugadorModel->eliminarJugador($id)) {
                header("Location: ".$_SERVER['PHP_SELF']."?id=".$_GET['id']);
                exit();
            } else {
                echo "Error al eliminar el jugador.";
            }
        }

        public function editandoJugador($id, $datos) {
            if ($datos['es_capitan'] && $this->jugadorModel->equipoConCapitan($datos['equipo_id'])) {
                $mensaje = "El equipo ya tiene un capitan";
                return $mensaje;
            }
            return $this->jugadorModel->editarJugador($datos['nombre'], $datos['numero'], $datos['equipo_id'], $datos['es_capitan'], $id);
        }

    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $jugadorController = new JugadorController();
        $jugadorController->eliminandoJugador($_POST['id']);
    }

    