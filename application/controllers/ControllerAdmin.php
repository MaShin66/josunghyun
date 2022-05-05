<?php

class ControllerAdmin extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->model('modelText');
                $this->load->model('modelCategory');

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
                $aCategory = $this->modelCategory->getAllCategory();

                $this->load->view('viewCategoryList', array('aCategory' => $aCategory));
        }

        // 카테고리 눌렀을 때 이미지 보여주기
        // public function categoryImage()
        // {
        //         $sCategory = $_GET['name'];

        //         $this->load->model('content');

        //         $aCategory = $this->contents->getAllCategory($sCategory);

        //         $this->load->view('viewCategoryList', array('aCategory' => $aCategory));
        // }

        public function categoryinsert()
        {
                $sCategory = $_GET['category'];
                $aCategory = array('name' => $sCategory);

                // db 값 추가
                $iInsertId = $this->modelCategory->insertCategory($aCategory);

                // file 명도 추가
                $oldumask = umask(0);
                mkdir('./uploads/'.$sCategory, 0777, true);
                umask($oldumask);

                if($iInsertId > 0) {
                        echo "<script>alert('카테고리가 추가됐습니다');</script>";
                        echo("<script>location.replace('./category');</script>");
                } else {
                        echo "<script>alert('카테고리를 추가에 실패했습니다');</script>";
                        echo("<script>location.replace('./category');</script>");
                }
        }

        public function categoryupdate()
        {
                $sId = $_GET['id'];
                $sOldCategory = $_GET['oldCategory'];
                $sNewCategory = $_GET['newCategory'];

                // db 값 바꾸기
                $bisSucc = $this->modelCategory->updateCategory($sId, $sNewCategory);

                // file 명도 바꾸기
                rename('./uploads/'.$sOldCategory, './uploads/'.$sNewCategory);

                if($bisSucc) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                        echo("<script>location.replace('./category');</script>");
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                        echo("<script>location.replace('./category');</script>");
                }
        }

        public function instagram()
        {
		$aInstagramUrl = $this->modelText->getInstagramUrl();

		$aAssign = array(
			'aInstagramUrl' => $aInstagramUrl['url']
		);

                $this->load->view('viewInstagram', $aAssign);
        }

        public function instagramExec()
        {
                $sEditUrl = $_GET["url"];

                $bisSucc = $this->modelText->updateInstagramUrl($sEditUrl);
                
                if($bisSucc) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                        echo("<script>location.replace('./instagram');</script>");
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                        echo("<script>location.replace('./instagram');</script>");
                }
        }

        public function textEdit()
        {
                $this->load->view('viewTextEdit');
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
                // temp 라는 이름으로 일단 폴더 만들기 함
                $oldumask = umask(0);
                mkdir('./uploads/temp', 0777, true);
                umask($oldumask);

                $config['upload_path']          = './uploads/temp';
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

                        $this->load->model('modelImageContent');

                        // 폴더 이름이 temp
                        $aUploadData['folder_name'] = 'temp';

                        // db에 해당 정보 넣고
                        $this->modelImageContent->insertUpload($aUploadData);

                        // 넣고 난 리턴 값 받아오기
                        $aImageContents = $this->modelImageContent->getImageContents();

                        $aData = array('aImageContents' => $aImageContents);

                        $this->load->view('upload/viewUploadSuccess', $aData);
                }
        }
}
?>
