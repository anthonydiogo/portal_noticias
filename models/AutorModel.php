<?php 
    require_once 'DAL/AutorDAO.php';

    class AutorModel {
        public ?int $idAutor;
        public ?string $nomeAutor;

        public function __construct(
            ?int $idAutor = null,
            ?string $nomeAutor = null
        ) {
            $this->idAutor = $idAutor;
            $this->nomeAutor = $nomeAutor;
        }

        public function getAutores() {
            $autorDAO = new AutorDAO();

            $autores = $autorDAO->getAutores();

            foreach ($autores as $chave => $autor) {
                $autores[$chave] = new AutorModel(
                    $autor['idAutor'],
                    $autor['nomeAutor']
                );
            }

            return $autores;
        }

        public function delete() {
            $autorDAO = new AutorDAO();

            return $autorDAO->deleteAutor($this);
        }

        public function create() {
            $autorDAO = new AutorDAO();

            return $autorDAO->createAutor($this);
        }

        public function updateAutor() {
            $autorDAO = new AutorDAO();

            return $autorDAO->updateAutor($this);
        }

        public function deleteAutor() {
            $autorDAO = new AutorDAO();

            return $autorDAO->deleteAutor($this);
        }

        public function getAutor($idAutor) {
            $autorDAO = new AutorDAO();

            $autor = $autorDAO->getAutor($idAutor);

            $autor = new AutorModel($autor['idAutor'], $autor['nomeAutor']);

            return $autor;
        }
    }
?>