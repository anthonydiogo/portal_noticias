<?php 
    class Router {
        private array $routes;

        public function __construct() {
            $this->routes = [
                'GET' => [
                    '/noticias' => [
                        'controller' => 'NoticiaController',
                        'function' => 'getNoticias'
                    ],
                    '/autores' => [
                        'controller' => 'AutorController',
                        'function' => 'getAutores'
                    ],
                    '/usuarios' => [
                        'controller' => 'UsuarioController',
                        'function' => 'getUsuarios'
                    ],
                    '/tipos-usuario' => [
                        'controller' => 'TipoUsuarioController',
                        'function' => 'getTiposUsuario'
                    ]
                ],
                'POST' => [
                    '/criar-noticia' => [
                        'controller' => 'NoticiaController',
                        'function' => 'createNoticia'
                    ],
                    '/criar-usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'createUsuario'
                    ],
                    '/criar-autores' => [
                        'controller' => 'AutorController',
                        'function' => 'createAutor'
                    ],
                    '/criar-autor' => [
                        'controller' => 'AutorController',
                        'function' => 'createAutor'
                    ],
                    '/noticia' => [
                        'controller' => 'NoticiaController',
                        'function' => 'getNoticia'
                    ],
                    '/usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'getUsuario'
                    ],
                    '/autor' => [
                        'controller' => 'AutorController',
                        'function' => 'getAutor'
                    ],
                    '/validar-email' => [
                        'controller' => 'UsuarioController',
                        'function' => 'validateEmail'
                    ],
                    '/login' => [
                        'controller' => 'UsuarioController',
                        'function' => 'validateUsuario'
                    ],
                    '/tipo-usuario' => [
                        'controller' => 'TipoUsuarioController',
                        'function' => 'getTipoUsuario'
                    ]
                ],
                'PUT' => [
                    '/atualizar-noticia' => [
                        'controller' => 'NoticiaController',
                        'function' => 'updateNoticia'
                    ],
                    '/atualizar-usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'updateUsuario'
                    ],
                    '/atualizar-autor' => [
                        'controller' => 'AutorController',
                        'function' => 'updateAutor'
                    ]
                ],
                'DELETE' => [
                    '/excluir-noticia' => [
                        'controller' => 'NoticiaController',
                        'function' => 'deleteNoticia'
                    ],
                    '/excluir-usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'deleteUsuario'
                    ],
                    'excluir-autores' => [
                        'controller' => 'AutorController',
                        'function' => 'deleteAutor'
                    ],
                    '/excluir-autor' => [
                        'controller' => 'AutorController',
                        'function' => 'deleteAutor'
                    ]
                ]
            ];
        }

        public function handleRequest(string $method, string $route): string {
            $routeExists = !empty($this->routes[$method][$route]);

            if (!$routeExists) {
                return json_encode([
                    'error' => 'Essa routa não existe',
                    'result' => null
                ]);
            }

            $routeInfo = $this->routes[$method][$route];

            $controller = $routeInfo['controller'];
            $function = $routeInfo['function'];

            require_once __DIR__ . '/../controllers/' . $controller . '.php';

            return (new $controller)->$function();
        }
    }
?>