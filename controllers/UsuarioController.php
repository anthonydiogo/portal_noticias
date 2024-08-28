<?php 
    require_once './models/UsuarioModel.php';

    class UsuarioController {
        public function getUsuarios() {
            $usuarioModel = new UsuarioModel();

            $usuarios = $usuarioModel->getUsuarios();

            return json_encode([
                'error' => null,
                'result' => $usuarios
            ]);
        }

        public function createUsuario() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idTipoUsuario']))
                return $this->mostrarError('Você deve informar o idTipoUsuario');

            if (empty($dados['nomeUsuario']))
                return $this->mostrarError('Você deve informar o nomeUsuario');

            if (empty($dados['emailUsuario']))
                return $this->mostrarError('Você deve informar o emailUsuario');

            if (empty($dados['senhaUsuario']))
                return $this->mostrarError('Você deve informar o senhaUsuario');

            $usuario = new UsuarioModel(
                null,
                $dados['idTipoUsuario'],
                $dados['nomeUsuario'],
                $dados['emailUsuario'],
                md5($dados['senhaUsuario'])
            );

            $usuario->create();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function updateUsuario() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idUsuario']))
            return $this->mostrarError('Você deve informar o idUsuario');

            if (empty($dados['idTipoUsuario']))
                return $this->mostrarError('Você deve informar o idTipoUsuario');

            if (empty($dados['nomeUsuario']))
                return $this->mostrarError('Você deve informar o nomeUsuario');

            if (empty($dados['emailUsuario']))
                return $this->mostrarError('Você deve informar o emailUsuario');

            if (empty($dados['senhaUsuario']))
                return $this->mostrarError('Você deve informar o senhaUsuario');

            $usuario = new UsuarioModel(
                $dados['idUsuario'],
                $dados['idTipoUsuario'],
                $dados['nomeUsuario'],
                $dados['emailUsuario'],
                md5($dados['senhaUsuario'])
            );

            $usuario->update();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function deleteUsuario() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idUsuario']))
                return $this->mostrarError('Você deve informar o idUsuario!');

            $usuario = new UsuarioModel($dados['idUsuario']);

            $usuario->delete();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function getUsuario() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idUsuario']))
                return $this->mostrarError('Voce deve informar o idUsuario!');

            $response = (new UsuarioModel())->getUsuario($dados['idUsuario']);

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function validateEmail() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['email']))
                return $this->mostrarError('Você deve informar o email!');

            $usuario = (new UsuarioModel())->getUsuarioByEmail($dados['email']);

            $response = empty($usuario) ? true : false;

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }

        public function validateUsuario() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['email']))
                return $this->mostrarError('Você deve informar o email!');

            if (empty($dados['senha']))
                return $this->mostrarError('Você deve informar a senha!');

            $usuario = (new UsuarioModel())->getUsuarioByEmailAndSenha($dados['email'], md5($dados['senha']));

            $response = empty($usuario) ? false : true;

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