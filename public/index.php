<?php
// Author: Diego Quiroz

require '../app.php';

use App\Models\ArticleController;
use App\Models\MessageController;
use App\Framework\Route;
use App\Framework\RouteController;

$routes = [

    new Route('/', 'GET', function () {
        readfile('templates/index.html');
    }),
    
    new Route('/blog', 'GET', function () {
        readfile('templates/blog.html');
    }),
    
    new Route('/api/articles', 'POST', function ($req) {
    	$model = new ArticleController();
    	$data = (array) json_decode(file_get_contents('php://input'), TRUE);
    	echo $model->insert($data);
    }),
    
    new Route('/api/articles', 'PUT', function ($req) {
    	$model = new ArticleController();
    	$data = (array) json_decode(file_get_contents('php://input'), TRUE);
    	echo $model->edit((int) $req['id'], $data);
    }),
    
    new Route('/api/articles', 'GET', function () {
    	$model = new ArticleController();
    	$response['body'] = json_encode($model->selectAll(), JSON_UNESCAPED_SLASHES);
    	echo $response['body'];
    }),
    
    new Route('/api/messages', 'POST', function () {
    	$model = new MessageController();
    	$data = (array) json_decode(file_get_contents('php://input'), TRUE);
    	echo $model->insert($data);
    }),
];

$router = new RouteController($routes);

