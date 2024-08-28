<?php 
    require_once 'Conexao.php';

    class AutorDAO {
        public function getAutores() {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM autor;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteAutor(AutorModel $autor) {
            $conexao = (new Conexao())->getConexao();

            $sql = "DELETE FROM autor WHERE idAutor = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $autor->idAutor);

            return $stmt->execute();
        }

        public function createAutor(AutorModel $autor) {
            $conexao = (new Conexao())->getConexao();

            $sql = "INSERT INTO autor VALUES (:id, :nome);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', null);
            $stmt->bindValue(':nome', $autor->nomeAutor);

            return $stmt->execute();
        }

        public function updateAutor(AutorModel $autor) {
            $conexao = (new Conexao())->getConexao();

            $sql = "UPDATE autor SET nomeAutor = :nome WHERE idAutor = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $autor->idAutor);
            $stmt->bindValue(':nome', $autor->nomeAutor);

            return $stmt->execute();
        }

        public function getAutor($idAutor) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM autor WHERE idAutor = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $idAutor);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>