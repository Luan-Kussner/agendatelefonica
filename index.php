<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Agenda\Page;
use \Agenda\PageAdmin;
use \Agenda\Model\User;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");
    
});

// CRUD 
$app->get("/admin/users", function() {

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));
});

$app->get("/admin/users/create", function() {

	$page = new PageAdmin();

	$page->setTpl("users-create");
});

$app->get("/admin/users/:id_contato/delete", function($id_contato){

	$user = new User();

	$user->get((int)$id_contato);

	$user->delete($id_contato);

	header("Location: /admin/users");
	exit;
	
});

$app->get("/admin/users/:id_contato", function($idcontato) {

	$contato = new User();

	$contato->get((int)$idcontato);

	
	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"contato"=>$contato->getValues()
	));
	
});

$app->post("/admin/users/create", function () {

//	User::verifyLogin();

    $user = new User();

    $user->save($_POST);

    header("Location: /admin/users");
	exit;

});

$app->post("/admin/users/:id_contato", function($idcontato){

	//	User::verifyLogin();
	
		$user = new User();
	
		$user->get((int)$idcontato);
	
		//$user->setData($_POST);
	
		$user->update($_POST);
	
		header("Location: /admin/users");
		exit;
		
	});

$app->run();

?>