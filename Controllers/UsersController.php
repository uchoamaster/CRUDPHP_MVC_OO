<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;

class UsersController extends Controller {

	private $user;
	private $arrayInfo;

	public function __construct() {
		$this->user = new Users();

		if(!$this->user->isLogged()) {
			header("Location: ".BASE_URL."login");
			exit;
		}

		$this->arrayInfo = array(
			'user' => $this->user,
			'menuActive' => 'users'
		);
	}

	public function index() {
		$user = new Users();
		$this->arrayInfo['list'] = $user->getList();
		$this->loadTemplate('users', $this->arrayInfo);
	}
	public function add_new_user(){
		$this->loadTemplate('users', $this->arrayInfo);
	}

	public function add_action_user() {

		$name  = $_POST['name'];
		$email = $_POST['email'];
		$cpf   = $_POST['password'];

		$user  = new Users();
		$user->add($name, $email, $password);

		header("Location: ".BASE_URL."users");
		exit;
		
	}

	public function edit($id) {
			$user = new Users();

			$this->arrayInfo['info'] = $home->getInfo($id);
			$this->loadTemplate("edit_user", $this->arrayInfo);
	}

	public function edit_action_user($id) {

		$name  = $_POST['name'];
		$email = $_POST['email'];
		$cpf   = $_POST['password'];


		$user  = new Users();
		$user->edit($id, $name, $email, $password);

		header("Location: ".BASE_URL."users");
		exit;
		
	}


}