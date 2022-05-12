<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerHome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelText');
		$this->load->model('ModelCategory');
		$this->load->model('ModelImageContent');
	}

	public function index()
	{	
		$aInstagramUrl = $this->ModelText->getInstagramUrl();

		$aMobileText = $this->ModelText->getMobileText();
		
		$aCategory = $this->ModelCategory->getAllCategory();

		$aImageList = $this->ModelImageContent->getAllImageContents();

		$aGroupCategoryImage = $this->GroupCategoryImage($aImageList);
		
		$aAssign = array(
			'sInstagramUrl' => $aInstagramUrl['url'],
			'aCategory' => $aCategory,
			'sMobileFristText' => $aMobileText[0]['url'],
			'sMobileSecondText' => $aMobileText[1]['url'],
			'aGroupCategoryImage' => $aGroupCategoryImage
		);

		$this->load->view('viewStudio', $aAssign);
	}

	public function getimage()
	{
		$jCategory = file_get_contents("php://input");

		$aCategory = json_decode($jCategory, true);

		$sCategory = $aCategory['category'];
		
		$aImageContent = $this->ModelImageContent->getImageContents($sCategory);

		echo json_encode($aImageContent);
	}

	private function GroupCategoryImage($aImageList)
	{
		$aGroupCategoryImage = array();	

		foreach ($aImageList as $value) {
			// 카테고리가 이미 있다면 이미지만
			if (array_key_exists($value['category'], $aGroupCategoryImage)) {
				array_push($aGroupCategoryImage[$value['category']], $value);
			} else { // 없다면 카테고리 + 이미지 추가
				$aGroupCategoryImage[$value['category']] = array();
				array_push($aGroupCategoryImage[$value['category']], $value);
			}
		}

		return $aGroupCategoryImage;
	}
}
