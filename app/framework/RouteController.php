<?php

namespace App\Framework;

class RouteController {
	
	private static $routes;
	private static $requestUri;
	private static $requestMethod;

	public function __construct(array $routes) {
		self::$routes = $routes;
        self::$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        self::$requestMethod = $_SERVER["REQUEST_METHOD"];

		self::validateRoute();
	}

	private static function validateRoute() {
		foreach(self::$routes as $route) {
            if ($route->getPath() === self::$requestUri && $route->getMethod() === self::$requestMethod) {
                $action = $route->getAction();
                $action();
            }
		}
	}
}
