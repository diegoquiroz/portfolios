<?php
// Author: Diego Quiroz

require '../app.php';

use App\ArticleController;
use App\MessageController;
use App\ContentsController;

$requestMethod = $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if($uri[1] === '') {
    readfile('index.html');
    exit();
} else if($uri[1] === 'blog') {
    readfile('blog.html');
    exit();
}
if ($uri[1] !== 'api') {
    header("HTTP/1.1 404 Not Found");
    exit();
} else {
	if ($uri[2] === 'articles') {
		$model = new ArticleController($mysql);

		if ($requestMethod === 'POST') {

			$data = (array) json_decode(file_get_contents('php://input'), TRUE);
			echo $model->insert($data);

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


