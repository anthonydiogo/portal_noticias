<?php
    require_once 'DAL/TipoUsuarioDAO.php';

    class TipoUsuarioModel {
        public ?int $idTipoUsuario;
        public ?string $descricaoTipoUsuario;

        public function __construct(?int $idTipoUsuario = null, ?string $descricaoTipoUsuario = null) {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->descricaoTipoUsuario = $descricaoTipoUsuario;
        }

        public function getTiposUsuario() {
            $tipoUsuarioDAO = new TipoUsuarioDAO();

            $tiposUsuario = $tipoUsuarioDAO->getTiposUsuario();

                foreach ($tiposUsuario as &$tipoUsuario) {
                    $tipoUsuario = new TipoUsuarioModel($tipoUsuario['idTipoUsuario'], $tipoUsuario['descricaoTipoUsuario']);
                }

                return $tiposUsuario;
        }

        public function getTipoUsuario($idTipoUsuario) {
            $tipoUsuarioDAO = new TipoUsuarioDAO();

            $tipoUsuario = $tipoUsuarioDAO->getTipoUsuario($idTipoUsuario);

            $tipoUsuario = new TipoUsuarioModel($tipoUsuario['idTipoUsuario'], $tipoUsuario['descricaoTipoUsuario']);

            return $tipoUsuario;
        }
    }
?>