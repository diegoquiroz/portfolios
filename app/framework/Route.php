<?php

namespace App\Framework;

class Route {

	private static $path;
	private static $httpMethod;
	public static $action;

	public function __construct(String $path, String $httpMethod, callable $action) {
		$this->path = $path;
		$this->httpMethod = $httpMethod;
	    $this->action = $action;
	}

	public function getPath() {
		return $this->path;
	}

	public function setPath(String $newPath) {
		$this->path = $newPath;
	}

	public function getMethod() {
		return $this->httpMethod;
	}

	public function setMethod(String $httpMethod) {
		$this->httpMethod = $httpMethod;
	}

	public function getAction() {
		return $this->action;
	}

	public function setAction(callable $action) {
		$this->action = $action;
	}
}
