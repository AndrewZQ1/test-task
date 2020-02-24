<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\lib\Color;
use application\models\Main;


class MainController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'default';
		$cout = $this->model->postsCount();
	}

	public function loginAction() {
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('add');
		}
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('Ошибка', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('add');
		}
		$this->view->render('Вход');
	}

	 public function indexAction() {
		$pagination = new Pagination($this->route, $this->model->postsCount());
		// debug($_POST, $this->route['id']); 
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->postsList($this->route),
			'count' => $this->model->postsCount(),
		];
		// debug( $color->setColor());
		$this->view->render('Главная страница', $vars);
	}

	public function statusAction() {
		if (!empty($_POST)) {
			$this->model->statusEdit($_POST, $this->route['id']);
			$color = new Color($this->model->postsStatus($_GET,  $this->route['id']));
			$colorName = $color->setColor();
			$this->model->postColor($colorName, $this->route['id']);
			$this->view->backPage($_SERVER['HTTP_REFERER']);		
		}
		$vars = [
			'data' => $this->model->postData($this->route['id'])[0],
		];
		$this->view->render('Редактировать пост', $vars);

	}

	public function postAction() {
		$adminModel = new Main;
		if (!$adminModel->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $adminModel->postData($this->route['id'])[0],
		];
		$this->view->render('Пост', $vars);
	}

	public function addAction() {
		if (!empty($_POST)) {
			// if (!$this->model->postValidate($_POST, 'add')) {
			// 	$this->view->message('error', $this->model->error);
			// }
			$id = $this->model->postAdd($_POST);
			debug($id);
			if (!$id) {
				$this->view->message('error', 'BAD');
			}
			$this->view->redirect('');
		}
		$this->view->render('Добавить клиента');
	}

	public function editAction() {
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			// if (!$this->model->postValidate($_POST, 'edit')) {
			// 	$this->view->message('error', $this->model->error);
			// }
			$this->model->postEdit($_POST, $this->route['id']);
			$this->view->redirect('post/'.$this->route['id'] );
		}
		$vars = [
			'data' => $this->model->postData($this->route['id'])[0],
		];
		$this->view->render('Редактировать клиента', $vars);
	}

	public function closeAction() {
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			// if (!$this->model->postValidate($_POST, 'edit')) {
			// 	$this->view->message('error', $this->model->error);
			// }
			$this->model->closeAdd($_POST, $this->route['id']);
			$this->view->backPage($_SERVER['HTTP_REFERER']);	
		}

		$this->view->render('Закрыть');
	}

	public function deleteAction() {
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->postDelete($this->route['id']);
		$this->view->redirect('');
	}

	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('login');
	}

	public function settingsAction() {
		$this->view->render('Настройки');
	}

	

}