<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Agenda\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");
    
});

$app->get("/admin/contatos", function() {

	$page = new PageAdmin();

	$page->setTpl("contatos");
});

$app->get("/admin/contatos/:idcontato", function($idcontato) {

	$page = new PageAdmin();

	$page->setTpl("contatos-create");
});

$app->get("/admin/contatos/:idcontato", function($idcontato) {

	$page = new PageAdmin();

	$page->setTpl("contatos-update");
});

$app->run();

 ?> 