<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login']) {
			$this->error = 'Логин указан неверно';
			return false;
		}
		if ($config['password'] != $post['password']) {
			$this->error = 'Пароль указан неверно';
			return false;
		}
		return true;
	}

	public function postValidate($post, $type) {
		$nameLen = iconv_strlen($post['name']);
		$descriptionLen = iconv_strlen($post['description']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 100) {
			$this->error = 'Описание должно содержать от 3 до 100 символов';
			return false;
		} elseif ($textLen < 10 or $textLen > 5000) {
			$this->error = 'Текст должнен содержать от 10 до 5000 символов';
			return false;
		}
		return true;
	}

	public function postAdd($post) {
		$params = [
			'id' => '',
			'type_client' => $post['type'],
			'name' => $post['name'],
			'phone_number' => $post['phone'],
			'addres' => $post['adress'],
			'model' => $post['model'],
			'sn' => $post['sn'],
			'broken' => $post['broken'],
			'tech' => $post['tech'],
			'comlectation' => $post['complectation'],
			'description' => $post['text'],
			'status' => 'Новый',
	 		'color' => 'bg-primary',
	 		'garanty' => '',
	 		'remont' => '',
	 		'symma' => '',
		];
		$this->db->query('INSERT INTO client VALUES (:id, :type_client, :name, :phone_number, :addres, :model, :sn, :broken, :tech, :comlectation, NOW(), :description, :status, :color, :garanty, :remont, :symma, NOW())', $params);
		return $this->db->lastInsertId();	
	}

	public function closeAdd($post, $id) {
		$params = [
			'id' => $id,
			'garanty' => $post['garanty'],
			'remont' => $post['remont'],
			'symma' => $post['symma'],
			'status' => 'Закрыт',
			'color' => 'bg-dark',
		];
		$this->db->query('UPDATE client SET garanty = :garanty, remont = :remont, symma = :symma, status = :status, color = :color, date_close = NOW() WHERE id = :id', $params);
	}

	public function postEdit($post, $id) {
		$params = [
			'id' => $id,
			'type_client' => $post['type'],
			'name' => $post['name'],
			'phone_number' => $post['phone'],
			'addres' => $post['adress'],
			'model' => $post['model'],
			'sn' => $post['sn'],
			'broken' => $post['broken'],
			'tech' => $post['tech'],
			'comlectation' => $post['complectation'],
			'description' => $post['text'],
		];
		$this->db->query('UPDATE client SET type_client = :type_client, name = :name, phone_number = :phone_number, addres = :addres, model = :model, sn = :sn, broken = :broken, tech = :tech, comlectation = :comlectation, description = :description WHERE id = :id', $params);
	}

	public function statusEdit($post, $id) {
		$params = [
			'id' => $id,
			'status' => $post['status'],
		];
		$this->db->query('UPDATE client SET status = :status WHERE id = :id', $params);
	}

	public function postColor($colorName ,$id) {
		$params = [
			'id' => $id,
			'color' => $colorName,
		];
		$this->db->query('UPDATE client SET color = :color WHERE id = :id', $params);
	}

	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM client WHERE id = :id', $params);
	}

	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM client WHERE id = :id', $params);
	}

	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM client WHERE id = :id', $params);
	}	

	public function postsCount() {
		return $this->db->column('SELECT COUNT(id) FROM client');
	}

	public function postsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM client ORDER BY id DESC LIMIT :start, :max', $params);
	}

	public function postsStatus($get, $id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT status FROM client WHERE id = :id', $params);
	}

}