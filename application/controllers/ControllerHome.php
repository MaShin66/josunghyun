<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerHome extends CI_Controller {
	public function index()
	{
		$this->load->model('modelText');
		$aInstagramUrl = $this->modelText->getInstagramUrl();

		$this->load->model('modelCategory');
		$aCategory = $this->modelCategory->getCategory();

		$aAssign = array(
			'aInstagramUrl' => $aInstagramUrl['url'],
			'aCategory' => $aCategory
		);

		$this->load->view('viewStudio', $aAssign);
	}
}
