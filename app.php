<?php

//include 'app/DatabaseController.php';
require 'app/models/ArticleController.php';
require 'app/models/MessageController.php';
require 'app/models/ContentsController.php';
require 'app/DatabaseController.php';

use App\DatabaseController;

$mysql = (new DatabaseController())->getConnection();

