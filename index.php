<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/analyzer/Lexical.php';

$app = AppFactory::create();

$_SERVER['title'] = "Analizador léxico";

$app->post('/validate/', function (Request $request, Response $response, $args) {
    $parsedBody = $request->getParsedBody();
    if (isset($parsedBody['string'])) {
        $lexicalC = new Lexical($parsedBody['string']);
        $result = json_encode($lexicalC->validate(true));
        $response->getBody()->write($result);
    } else {
        $response->getBody()->write(json_encode(["error" => "Parâmetro 'string' não fornecido."]));
        return $response->withStatus(400)
            ->withHeader('Content-Type', 'application/json');
    }
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/', function (Request $request, Response $response, $args) {
    include './frontend/home.php';
    return $response;
});

$app->get('/tabela', function (Request $request, Response $response, $args) {
    include './frontend/header.php';
    include './tabelalexica.html';
    include './frontend/footer.php';
    return $response;
});

$app->run();
