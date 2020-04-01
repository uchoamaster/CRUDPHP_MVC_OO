<?php

namespace Models;

use \Core\Model;

class Users extends Model {

	// Metodo para verificar se o Usuario está logado
	public function isLogged() {
		
		// Se a sessão NÃO estiver vazia e EXISTIR, retorne true.
		if(!empty($_SESSION['crudPHP'])) {
			return true;
		}

		// Caso nao exista, retorne false;
		return false;

	}

	// Metodo para verificar o Login
	public function validateLogin($email, $password) {
		
		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':password', md5($password));
		$sql->execute();

		if($sql->rowCount() > 0) {
			// Se o usuario existe, armazenamos as informações dele, e criamos uma sessao para ele
			$row = $sql->fetch();
			$_SESSION['crudPHP'] = $row;
			
			// Retorna true (verdadeiro) caso encontre algum usuario.
			return true;
		}

		// Caso não seja encontrado, retorna false (falso)
		return false;
		
	}

	public function getList() {
		$data = array();

		$sql = $this->db->query("SELECT * FROM users");

		if($sql->rowCount() > 0 ) {
			$data = $sql->fetchAll();
		}

	 return $data;
	}

		public function getInfo($id) {
		$data = array();

		$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$data = $sql->fetch();
		}
	  return $data;
	}
	public function add_new_user($name, $email, $password) {
		$sql = "INSERT INTO users SET name = :name, email = :email, password = :password";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":password", $password);
		$sql->execute();
	}
	public function edit_user($id, $name, $email, $password) {
		$sql = $this->db->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":password", $password);
		$sql->execute();
	}

} // End of Model