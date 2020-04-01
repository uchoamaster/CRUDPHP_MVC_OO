<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Home;

class HomeController extends Controller {

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
			'menuActive' => 'home'
		);
	}

	public function index() {
		$home = new Home();
		
		$this->arrayInfo['list'] = $home->getList();
		$this->loadTemplate('home', $this->arrayInfo);
	}
	public function add(){
		$this->loadTemplate('peoples_add', $this->arrayInfo);
	}

	public function add_action() {

		$name  = $_POST['name'];
		$email = $_POST['email'];
		$cpf   = $_POST['cpf'];
		$birth = $_POST['birth'];
		$phone = $_POST['phone'];

		$home  = new Home();
		$home->add($name, $email, $cpf, $birth, $phone);

		header("Location: ".BASE_URL."home");
		exit;
		
	}

	public function edit($id) {
			$home = new Home();

			$this->arrayInfo['info'] = $home->getInfo($id);
			$this->loadTemplate("peoples_edit", $this->arrayInfo);
	}

	public function edit_action($id) {

		$name  = $_POST['name'];
		$email = $_POST['email'];
		$cpf   = $_POST['cpf'];
		$birth = $_POST['birth'];
		$phone = $_POST['phone'];

		$home  = new Home();
		$home->edit($id, $name, $email, $cpf, $birth, $phone);

		header("Location: ".BASE_URL."home");
		exit;
		
	}

	public function delete($id) {
		$home = new Home();
		$home->delete($id);


		header("Location: ".BASE_URL."home");
		exit;
	}
}