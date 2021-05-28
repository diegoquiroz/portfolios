<?php
// Author: Diego Quiroz

require '../app.php';

use App\Models\ArticleController;
use App\Models\MessageController;
use App\Models\ContentsController;
use App\Framework\Route;
use App\Framework\RouteController;

$routes = [
    new Route('/', 'GET', function () {
        readfile('templates/index.html');
    }),
    new Route('/blog', 'GET', function () {
        readfile('templates/blog.html');
    }),

    new Route('/api', 'POST', function () {
		$model = new ArticleController($mysql);
		$data = (array) json_decode(file_get_contents('php://input'), TRUE);
		echo $model->insert($data);
    }),
];

$router = new RouteController($routes);

if ($uri[1] !== 'api') {
    header("HTTP/1.1 404 Not Found");
    exit();
} else {
	if ($uri[2] === 'articles') {

		if ($requestMethod === 'POST') {


		} elseif ($requestMethod === 'PUT') {

			$data = (array) json_decode(file_get_contents('php://input'), TRUE);
			echo $model->edit((int) $uri[3], $data);

		} elseif ($requestMethod === 'GET') {

			$response['body'] = json_encode($model->selectAll(), JSON_UNESCAPED_SLASHES);
			echo $response['body'];

		}

	} elseif ($uri[2] === 'messages') {

		$model = new MessageController($mysql);
		if ($requestMethod === 'POST') {
			$data = (array) json_decode(file_get_contents('php://input'), TRUE);
			echo $model->insert($data);
		}
	} elseif ( $uri[2] === 'contents') {
		$model = new ContentsController($mysql);
		$response['body'] = json_encode($model->selectAll(), JSON_UNESCAPED_SLASHES);
		echo $response['body'];
	}
}


