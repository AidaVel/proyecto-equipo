<!-- Modelo de jugador -->
<?php
    require_once __DIR__ . "/../database/Database.php";

    class Jugador {
        private $db;

        public function __construct() {
            $this->db = Database::connect();
        }

        public function obtenerJugadores() {
            $sql = 'SELECT * FROM jugador';
            return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function obtenerJugador($id) {
            $sql = 'SELECT * FROM jugador WHERE id = :id';
            $sentenciaPreparada = $this->db->prepare($sql);
            $sentenciaPreparada->execute(['id'=>$id]);
            return $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
        }

        public function obtenerJugadoresPorEquipo($equipo_id) {
            $sql = 'SELECT * FROM jugador WHERE equipo_id = :equipo_id';
            $sentenciaPreparada = $this->db->prepare($sql);
            $sentenciaPreparada->execute(['equipo_id'=>$equipo_id]);
            return $sentenciaPreparada->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function eliminarJugador($id) {
            $sql = 'DELETE FROM jugador WHERE id = :id';
            $sentenciaPreparada = $this->db->prepare($sql);            
            return $sentenciaPreparada->execute(['id'=>$id]);
        }

        public function editarJugador($nombre, $numero, $equipo_id, $es_capitan, $id) {
            $sql = 'UPDATE jugador SET nombre = :nombre, numero = :numero, equipo_id = :equipo_id, es_capitan = :es_capitan WHERE id = :id';  
            $sentenciaPreparada = $this->db->prepare($sql);
            return $sentenciaPreparada->execute(['nombre' => $nombre, 'numero' => $numero, 'equipo_id'=>$equipo_id, 'es_capitan'=>$es_capitan, 'id' => $id]);    
        }

        public function equipoConCapitan($equipo_id) {
            $sql = 'SELECT COUNT(*) AS total FROM jugador WHERE equipo_id = :equipo_id AND es_capitan = 1';
            $sentenciaPreparada = $this->db->prepare($sql);
            $sentenciaPreparada->execute(['equipo_id'=>$equipo_id]);
            $resultado = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'] > 0;
        }

    }
?>