<?php 
    require_once 'Conexao.php';

    class TipoUsuarioDAO {
        public function getTiposUsuario() {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM tipo_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getTipoUsuario($idTipoUsuario) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM tipo_usuario WHERE idTipoUsuario = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $idTipoUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>