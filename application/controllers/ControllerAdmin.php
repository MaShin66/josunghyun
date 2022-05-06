<?php

class ControllerAdmin extends CI_Controller {
        public function __construct()
        {
                parent::__construct();

                $this->load->model('ModelText');
                $this->load->model('ModelCategory');
                $this->load->model('ModelImageContent');

                // if ($_POST) {

                // } else {

                // }

        }

        public function index()
        {
                // $this->load->view('viewLogin');
                $this->load->view('viewAdmin');
        }

        // public function list()
        // {
        //         $this->load->view('viewAdmin');
        // }

        public function category()
        {
                $aCategory = $this->ModelCategory->getAllCategory();

                $this->load->view('viewCategory', array('aCategory' => $aCategory));
        }

        // 카테고리 눌렀을 때 이미지 보여주기
        public function categoryImage()
        {
                $sCategory = $_GET['name'];

                $aCategoryImage = $this->ModelImageContent->getImageContents($sCategory);

                $aAssign = array(
                        'sCategory' => $sCategory,
                        'aCategoryImage' => $aCategoryImage
                );

                $this->load->view('viewCategoryImage', $aAssign);
        }

        public function categoryinsert()
        {
                $sCategory = $_GET['category'];
                $aCategory = array('name' => $sCategory);

                // db 값 추가
                $iInsertId = $this->ModelCategory->insertCategory($aCategory);

                // file 명도 추가
                $oldumask = umask(0);
                mkdir('./uploads/'.$sCategory, 0777, true);
                umask($oldumask);

                if($iInsertId > 0) {
                        echo "<script>alert('카테고리가 추가됐습니다');</script>";
                } else {
                        echo "<script>alert('카테고리를 추가에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./category');</script>";
        }

        public function categoryupdate()
        {
                $sId = $_GET['id'];
                $sOldCategory = $_GET['oldCategory'];
                $sNewCategory = $_GET['newCategory'];

                // db 값 바꾸기
                $bisSucc = $this->ModelCategory->updateCategory($sId, $sNewCategory);

                // file 명도 바꾸기
                rename('./uploads/'.$sOldCategory, './uploads/'.$sNewCategory);

                if($bisSucc) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./category');</script>";
        }

        public function categoryDelete()
        {
                $sId = $_POST['id'];
                $sCategory = $_POST['category'];

                // db에서 지우고
                $bisSucc = $this->ModelCategory->deleteCategory($sId);

                // file에서도 지우기
                rmdir('./uploads/'.$sCategory);

                if($bisSucc) {
                        echo "<script>alert('삭제에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('삭제에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./category');</script>";
        }

        public function instagram()
        {
		$aInstagramUrl = $this->ModelText->getInstagramUrl();

		$aAssign = array(
			'aInstagramUrl' => $aInstagramUrl['url']
		);

                $this->load->view('viewInstagram', $aAssign);
        }

        public function instagramExec()
        {
                $sEditUrl = $_GET["url"];

                $bisSucc = $this->ModelText->updateInstagramUrl($sEditUrl);
                
                if($bisSucc) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./instagram');</script>";
        }

        public function textEdit()
        {
                $aMobileText = $this->ModelText->getMobileText();

		$aAssign = array(
			'sMobileFristText' => $aMobileText[0]['url'],
			'sMobileSecondText' => $aMobileText[1]['url']
		);

                $this->load->view('viewTextEdit', $aAssign);
        }

        public function textExec()
        {
                $sFirstLine = $_GET["firstLine"];
                $sSecondLine = $_GET["secondLine"];

                $bisSucc = $this->ModelText->updateMobileText($sFirstLine, $sSecondLine);
                
                if($bisSucc) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./textEdit');</script>";
        }

        public function adminId()
        {
                $this->load->view('viewAdminId');
        }
        
        public function upload()
        {
                // uploads 안의 모든 폴더와 파일 가져오기
                $dir = "./uploads/";
                if (is_dir($dir)){
                        if ($dh = opendir($dir)){
                                while (($file = readdir($dh)) !== false) {
                                        // . 와 .. 는 빼고 보여주기
        
                                        if ($file !== '.' || $file !== '..') {
                                                // echo '<xmp>';
                                                // var_dump($file);
                                                echo $file.'<br>';
                                        }
                                }
                                closedir($dh);
                        }
                }
                $this->load->view('upload/viewUploadForm', array('error' => ' '));

        }

        public function uploadexec()
        {
                $sCategory = $_POST['category'];

                $config['upload_path']          = './uploads/'.$sCategory;
                $config['allowed_types']        = 'gif|jpg|png';
                $confg['file_ext_tolower']      = true;
                $config['max_size']             = 0; // 2 MB (2048 KB) 가 최대
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if (! $this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload/viewUploadForm', $error);
                } else {
                        // 업로드 하고
                        $aUploadData = $this->upload->data();

                        $aUploadData['category'] = $sCategory;

                        // db에 해당 정보 넣고
                        $bisSucc = $this->ModelImageContent->insertUpload($aUploadData);

                        if($bisSucc > 0) {
                                echo "<script>alert('업로드 성공했습니다');</script>";
                        } else {
                                echo "<script>alert('변경에 실패했습니다');</script>";
                        }
                        echo "<script>location.replace('../categoryImage?name=$sCategory');</script>";
                }
        }

        public function deleteImage()
        {
                $sContentIdx = $_POST['contentIdx'];
                $sCategory = $_POST['category'];
                $sfileName = $_POST['fileName'];

                // db에서 지우고
                $bisSucc = $this->ModelImageContent->deleteImage($sContentIdx);

                // file에서도 지우기
                unlink('./uploads/'.$sCategory.'/'.$sfileName);

                if($bisSucc) {
                        echo "<script>alert('삭제에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('삭제에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./categoryImage?name=$sCategory');</script>";
        }
}
?>