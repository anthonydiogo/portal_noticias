<?php 
    require_once 'Conexao.php';

    class UsuarioDAO {
        public function getUsuarios() {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function createUsuario(UsuarioModel $usuario) {
            $conexao = (new Conexao())->getConexao();

            $sql = "INSERT INTO usuario VALUES (:id, :idTipoUsuario, :nome, :email, :senha);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', null);
            $stmt->bindValue(':idTipoUsuario', $usuario->idTipoUsuario);
            $stmt->bindValue(':nome', $usuario->nomeUsuario);
            $stmt->bindValue(':email', $usuario->emailUsuario);
            $stmt->bindValue(':senha', $usuario->senhaUsuario);

            return $stmt->execute();
        }

        public function updateUsuario(UsuarioModel $usuario) {
            $conexao = (new Conexao())->getConexao();

            $sql = "UPDATE usuario SET idTipoUsuario = :idTipoUsuario, nomeUsuario = :nome, emailUsuario = :email, senhaUsuario = :senha WHERE  idUsuario = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $usuario->idUsuario);
            $stmt->bindValue(':idTipoUsuario', $usuario->idTipoUsuario);
            $stmt->bindValue(':nome', $usuario->nomeUsuario);
            $stmt->bindValue(':email', $usuario->emailUsuario);
            $stmt->bindValue(':senha', $usuario->senhaUsuario);

            return $stmt->execute();
        }

        public function deleteUsuario(UsuarioModel $usuario) {
            $conexao = (new Conexao())->getConexao();

            $sql = "DELETE FROM usuario WHERE idUsuario = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $usuario->idUsuario);

            return $stmt->execute();
        }

        public function getUsuario($idUsuario) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE idUsuario = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $idUsuario);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getUsuarioByEmail($email) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE emailUsuario = :email;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getUsuarioByEmailAndSenha($email, $senha) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE emailUsuario = :email AND senhaUsuario = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>