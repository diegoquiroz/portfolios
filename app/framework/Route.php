<?php

namespace App\Framework;

class Route {

	private static $path;
	private static $httpMethod;
	public static $action;

	public function __construct(String $path, String $httpMethod, callable $action) {
		self::$path = $path;
		self::$httpMethod = $httpMethod;
		self::$action = $action;
	}

	public function getPath() {
		return self::$path;
	}

	public function setPath(String $newPath) {
		self::$path = $newPath;
	}

	public function getMethod() {
		return self::$httpMethod;
	}

	public function setMethod(String $httpMethod) {
		self::$httpMethod = $httpMethod;
	}

	public function getAction() {
		return self::$action;
	}

	public function setAction(callable $action) {
		self::$action = $action;
	}
}
