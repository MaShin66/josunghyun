<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerHome extends CI_Controller {
	public function __construct()
	{
		$this->load->model('ModelText');
		$this->load->model('ModelCategory');
	}

	public function index()
	{	
		$aInstagramUrl = $this->ModelText->getInstagramUrl();

		$aMobileText = $this->ModelText->getMobileText();
		
		$aCategory = $this->ModelCategory->getAllCategory();
		
		$aAssign = array(
			'sInstagramUrl' => $aInstagramUrl['url'],
			'aCategory' => $aCategory,
			'sMobileFristText' => $aMobileText[0]['url'],
			'sMobileSecondText' => $aMobileText[1]['url']
		);

		$this->load->view('viewStudio', $aAssign);
	}
}
