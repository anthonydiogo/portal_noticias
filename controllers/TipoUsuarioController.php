<?php 
    require_once './models/TipoUsuarioModel.php';

    class TipoUsuarioController {
        public function getTiposUsuario() {
            $tipoUsuarioModel = new TipoUsuarioModel();
            
            $tiposUsuario = $tipoUsuarioModel->getTiposUsuario();

            return json_encode([
                'error' => null,
                'result' => $tiposUsuario
            ]);
        }

        public function getTipoUsuario() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['idTipoUsuario']))
                return $this->mostrarError('Você deve informar o idTipoUsuario!');

            $tipoUsuarioModel = new TipoUsuarioModel();
            
            $tipoUsuario = $tipoUsuarioModel->getTipoUsuario($dados['idTipoUsuario']);

            return json_encode([
                'error' => null,
                'result' => $tipoUsuario
            ]);
        }

        private function mostrarError(string $mensagem) {
            return json_encode([
                'error' => $mensagem,
                'result' => null
            ]);
        }
    }
?>