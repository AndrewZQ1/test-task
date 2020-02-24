<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Settings;


class SettingsController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'default';
	}

	public function documentsAction() {
		$vars = [
			'list' => $this->model->docsList($this->route),
		];
		$this->view->render('Документы', $vars);
	}

	public function createAction() {
		if(!empty($_POST))
		{
			$id =$this->model->docAdd($_POST);
			if(!$id)
			{
				$this->view->message('error', 'BAD');
			}
			$this->view->message('success', 'Пост добавлен');
		}
		$this->view->render('Создание документа');
	}

}