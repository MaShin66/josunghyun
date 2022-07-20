<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerArchive extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('ModelText');
		$this->load->model('ModelCategory');
		$this->load->model('ModelImageContent');
		$this->load->model('ModelArchive');
		$this->load->model('ModelArchiveContent');
	}

	public function index()
	{	
		$aInstagramUrl = $this->ModelText->getInstagramUrl();

		$aMobileText = $this->ModelText->getMobileText();
		
		$aCategory = $this->ModelCategory->getAllCategory();
		$aImageList = $this->ModelImageContent->getAllImageContents();
		$aGroupCategoryImage = $this->GroupCategoryImage2($aImageList);

		$aArchive = $this->ModelArchive->getAllArchive();
		$aArchiveList = $this->ModelArchiveContent->getAllArchiveContent();
		$aGroupArchiveImage = $this->GroupArchiveImage2($aArchiveList);
		
		$aAssign = array(
			'sInstagramUrl' => $aInstagramUrl['url'],
			'sMobileFristText' => $aMobileText[0]['url'],
			'sMobileSecondText' => $aMobileText[1]['url'],
			'aCategory' => $aCategory,
			'aGroupCategoryImage' => $aGroupCategoryImage,
			'aArchive' => $aArchive,
			'aGroupArchiveImage' => $aGroupArchiveImage
		);

		$this->load->view('viewTest', $aAssign);
	}

	private function GroupCategoryImage2($aImageList)
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

	private function GroupArchiveImage2($aImageList)
	{
		$aGroupArchiveImage = array();	

		foreach ($aImageList as $value) {
			// 아카이브 이미 있다면 이미지만
			if (array_key_exists($value['archive'], $aGroupArchiveImage)) {
				array_push($aGroupArchiveImage[$value['archive']], $value);
			} else { // 없다면 카테고리 + 이미지 추가
				$aGroupArchiveImage[$value['archive']] = array();
				array_push($aGroupArchiveImage[$value['archive']], $value);
			}
		}

		return $aGroupArchiveImage;
	}

	public function getimage()
	{
		$jArchive = file_get_contents("php://input");

		$aArchive = json_decode($jArchive, true);

		$sArchive = $aArchive['archive'];
		
		$aImageContent = $this->ModelArchiveContent->getArchiveContents($aArchive);

		echo json_encode($aImageContent);
	}
}
