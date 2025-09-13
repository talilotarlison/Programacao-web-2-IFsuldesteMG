<?php
    require_once __DIR__ . '/controllers/CadastroController.php';
    require_once __DIR__ . '/controllers/ErroController.php';
    require_once __DIR__ . '/controllers/LoginController.php';
    require_once __DIR__ . '/controllers/HomeController.php';
    require_once __DIR__ . '/controllers/SairController.php';

    // Captura a rota da URL
    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Define rotas válidas
    $routesValidete = [
        '/home'     => 'views/home.php',
        '/cadastro' => 'views/cadastroUsuario.php',
        '/login'    => 'views/login.php',
        '/sair'     => 'views/sair.php',
        '/erro'     => 'views/erro.php',
        '/'         => 'views/login.php', // rota padrão para a raiz
    ];

    // class de rota
    class App {
        public $request;
        public $routesValidete;

        public function __construct($request, $routesValidete) {
            $this->request = $request;
            $this->routesValidete = $routesValidete;
        }


        function routeRequest($myRoute, $Controller) {
            // Remove barra final, exceto para a raiz
            // Normaliza a rota removendo barra final (exceto raiz)
            if ($this->request !== '/' && substr($this->request, -1) === '/') {
                $this->request = rtrim($this->request, '/');
            }

            // Verifica se a rota requisitada existe nas rotas válidas e se é igual à rota esperada
            if (array_key_exists($this->request, $this->routesValidete) && $this->request === $myRoute) {
                $controller = new $Controller();
                $controller->handle($this->routesValidete[$myRoute]);
                exit;
            }else{
                // Se a rota não for encontrada, redireciona para a página de erro
                http_response_code(404);
                include $this->routesValidete['/erro'];
                exit;
            }
        }
    }

    // Instancia a classe de rota
    $app = new App($request, $routesValidete);

    // Verifica e roteia a requisição
    if($request === '/cadastro'){
        // @router -> /cadastro
        $app->routeRequest("/cadastro", "CadastroController");
        exit;
    }

    if($request === '/login'){
        // @router -> /login
        $app->routeRequest("/login", "LoginController");
        exit;
    }

    if($request === '/'){
        // @router -> /login
        $app->routeRequest("/", "LoginController");
        exit;
    }

    if($request === '/home'){
        // @router -> /home
        $app->routeRequest("/home", "HomeController");
        exit;
    }

    if($request === '/sair'){
        // @router -> /home
        $app->routeRequest("/sair", "SairController");
        exit;
    }

    // Verifica se a rota existe nas rotas válidas
    if(!array_key_exists($request, $routesValidete) || $request === '/erro'){
        // @router -> /erro
        http_response_code(404);
        $app->routeRequest("/erro", "ErroController");
        exit;
    }

    // Se não encontrar, tenta adicionar uma barra final e procurar novamente
    $altRequest = $request . '/';
    if (array_key_exists($altRequest, $routesValidete)) {
        include $routesValidete[$altRequest];
        exit;
    }

    exit;
?>