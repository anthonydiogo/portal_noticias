<?php 
    require_once 'DAL/UsuarioDAO.php';

    class UsuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nomeUsuario;
        public ?string $emailUsuario;
        public ?string $senhaUsuario;

        public function __construct(
            ?int $idUsuario = null,
            ?int $idTipoUsuario = null,
            ?string $nomeUsuario = null,
            ?string $emailUsuario = null,
            ?string $senhaUsuario = null
        ) {
            $this->idUsuario = $idUsuario;
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nomeUsuario = $nomeUsuario;
            $this->emailUsuario = $emailUsuario;
            $this->senhaUsuario = $senhaUsuario;
        }

        public function getUsuarios() {
            $usuarioDAO = new UsuarioDAO();

            $usuarios = $usuarioDAO->getUsuarios();

            foreach ($usuarios as &$usuario) {
                $usuario = new UsuarioModel(
                    $usuario['idUsuario'],
                    $usuario['idTipoUsuario'],
                    $usuario['nomeUsuario'],
                    $usuario['emailUsuario'],
                    $usuario['senhaUsuario']
                );
            }

            return $usuarios;
        }

        public function create() {
            $usuarioDAO = new UsuarioDAO();

            return $usuarioDAO->createUsuario($this);
        }

        public function update() {
            $usuarioDAO = new UsuarioDAO();

            return $usuarioDAO->updateUsuario($this);
        }

        public function delete() {
            $usuarioDAO = new UsuarioDAO();

            return $usuarioDAO->deleteUsuario($this);
        }

        public function getUsuario($idUsuario) {
            $usuarioDAO = new UsuarioDAO();

            $usuario = $usuarioDAO->getUsuario($idUsuario);

            $usuario = new UsuarioModel(
                $usuario['idUsuario'], 
                $usuario['idTipoUsuario'],
                $usuario['nomeUsuario'],
                $usuario['emailUsuario'],
                $usuario['senhaUsuario']
            );

            return $usuario;
    }

    public function getUsuarioByEmail($email) {
        $usuarioDAO = new UsuarioDAO();

        return $usuarioDAO->getUsuarioByEmail($email);
    }
    public function getUsuarioByEmailAndSenha($email, $senha) {
        $usuarioDAO = new UsuarioDAO();

        return $usuarioDAO->getUsuarioByEmailAndSenha($email, $senha);
    }
}
?>