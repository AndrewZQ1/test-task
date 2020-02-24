<?php  

namespace application\models;

use application\core\Model;

Class Settings extends Model {

	public function docsList($route) {
	return $this->db->row('SELECT * FROM docs');
	}


	public function docAdd($post) {
		$params = [
			'doc_id' => '',
			'doc_name' => $post['docname'],
			'document' => $post['doc'],
		];
		$this->db->query('INSERT INTO docs VALUES (:doc_id, :doc_name, :document)', $params);
		return $this->db->lastInsertId();	
	}

}