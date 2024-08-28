<?php
    require_once './models/AutorModel.php';

    class AutorController {
        public function getAutores() {
            $autorModel = new AutorModel();

            $response = $autorModel->getAutores();

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function createAutor() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['nomeAutor']))
                return $this->mostrarError('Você deve informar o nomeAutor!');

            $autor = new AutorModel(null, $dados['nomeAutor']);

            $response = $autor->create();

            return json_encode([
                'error' => null,
                'response' => $response
            ]);
        }

        public function deleteAutores() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idAutor']))
                return $this->mostrarError('Você deve informar o idAutor!');

            $autor = new AutorModel($dados['idAutor']);

            $response = $autor->delete();

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function createAutores() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idAutor']))
                return $this->mostrarError('Você deve informar o idAutor');
            if (empty($dados['nomeAutor']))
                return $this->mostrarError('Você deve informar o nomeAutor');

            $autor = new AutorModel(
                $dados['idAutor'],
                $dados['nomeAutor']
            );

            $response = $autor->create();

            return json_encode([
                'error' => null,
                'result' => $response,
            ]);
        }

        public function updateAutor() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idAutor']))
                return $this->mostrarError('Você deve informar o idAutor!');

            if (empty($dados['nomeAutor']))
                return $this->mostrarError('Você deve informar o nomeAutor!');

            $autor = new AutorModel($dados['idAutor'], $dados['nomeAutor']);

            $response = $autor->updateAutor();

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function deleteAutor() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idAutor']))
                return $this->mostrarError('Você deve informar o idAutor!');

            $autor = new AutorModel($dados['idAutor']);

            $response = $autor->delete();

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function getAutor() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idAutor']))
                return $this->mostrarError('Voce deve informar o idAutor!');

            $response = (new AutorModel())->getAutor($dados['idAutor']);

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        private function mostrarError(string $mensagem) {
            if (empty($_POST['idAutor'])) 
                return json_encode([
                    'error' => $mensagem,
                    'result' => null
                ]);
        }
    }
?>