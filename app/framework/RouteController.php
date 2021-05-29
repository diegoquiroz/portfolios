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
		foreach(self::$routes as $r) {
            if ($r->getPath() === self::$requestUri && $r->getMethod() === self::$requestMethod) {
                if ($r->getPath() === 'api') {
                    $action = $r->getAction();
                    $request = explode( '/', $r->getPath());

                    $action($request);
                    
                } else {
                    $action = $r->getAction();
                    $action();
                }
            }
		}
	}
}
