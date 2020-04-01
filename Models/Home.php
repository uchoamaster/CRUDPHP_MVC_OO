<?php

namespace Models;

use \Core\Model;

class Home extends Model {

	public function getList() {
		$data = array();

		$sql = $this->db->query("SELECT * FROM peoples");

		if($sql->rowCount() > 0) {
			$data = $sql->fetchAll();
		}
	  return $data;
	}

	public function getInfo($id) {
		$data = array();

		$sql = $this->db->prepare("SELECT * FROM peoples WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$data = $sql->fetch();
		}
	  return $data;
	}
	public function add($name, $email, $cpf, $birth, $phone) {
		$sql = "INSERT INTO peoples SET name = :name, email = :email, cpf = :cpf, birth = :birth, phone = :phone";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":birth", $birth);
		$sql->bindValue(":phone", $phone);
		$sql->execute();
	}
	public function edit($id, $name, $email, $cpf, $birth, $phone) {
		$sql = $this->db->prepare("UPDATE peoples SET name = :name, email = :email, cpf = :cpf, birth = :birth, phone = :phone WHERE id = :id");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":birth", $birth);
		$sql->bindValue(":phone", $phone);
		$sql->execute();
	}

	public function	delete($id) {
		$sql = $this->db->prepare("DELETE FROM peoples WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
}