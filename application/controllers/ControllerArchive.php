<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerArchive extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('ModelText');
		$this->load->model('ModelArchive');
		$this->load->model('ModelArchiveContent');
	}

	public function index()
	{	
		$aInstagramUrl = $this->ModelText->getInstagramUrl();

		$aMobileText = $this->ModelText->getMobileText();
		
		$aArchive = $this->ModelArchive->getAllArchive();

		$aImageList = $this->ModelArchiveContent->getAllArchiveContent();

		$aGroupArchiveImage = $this->GroupArchiveImage($aImageList);
		
		$aAssign = array(
			'sInstagramUrl' => $aInstagramUrl['url'],
			'aArchive' => $aArchive,
			'sMobileFristText' => $aMobileText[0]['url'],
			'sMobileSecondText' => $aMobileText[1]['url'],
			'aGroupArchiveImage' => $aGroupArchiveImage
		);

		$this->load->view('viewStudioArchive', $aAssign);
	}

	public function getimage()
	{
		$jArchive = file_get_contents("php://input");

		$aArchive = json_decode($jArchive, true);

		$sArchive = $aArchive['archive'];
		
		$aImageContent = $this->ModelArchiveContent->getArchiveContents($aArchive);

		echo json_encode($aImageContent);
	}

	private function GroupArchiveImage($aImageList)
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
}
