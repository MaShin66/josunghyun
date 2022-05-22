<?php

class ControllerAdmin extends CI_Controller {
        public function __construct()
        {
                parent::__construct();

                $this->load->model('ModelText');
                $this->load->model('ModelCategory');
                $this->load->model('ModelArchive');
                $this->load->model('ModelImageContent');
                $this->load->model('ModelArchiveContent');

                if(!$this->session->userdata('is_login')) {
                        $this->load->view('viewLogin');
                        redirect('/login');
                }
        }

        public function index()
        {
                $this->load->view('viewAdmin');
        }

        public function category()
        {
                $aCategory = $this->ModelCategory->getAllCategory();

                $this->load->view('viewCategory', array('aCategory' => $aCategory));
        }

        public function archive()
        {
                $aArchive = $this->ModelArchive->getAllArchive();

                $this->load->view('viewArchive', array('aArchive' => $aArchive));
        }

        // 카테고리 눌렀을 때 이미지 보여주기
        public function categoryImage()
        {
                $sCategory = $_GET['name'];

                $CategoryId = $this->ModelCategory->getCategoryId($sCategory);

                $aCategoryImage = $this->ModelImageContent->getImageContents($sCategory);

                $aAssign = array(
                        'sCategoryId' => $CategoryId['id'],
                        'sCategory' => $sCategory,
                        'aCategoryImage' => $aCategoryImage
                );

                $this->load->view('viewCategoryImage', $aAssign);
        }

        public function categoryinsert()
        {
                $sCategory = $_GET['category'];
                $aCategory = array('name' => $sCategory);

                $sOrderNumber = $this->ModelCategory->getMaxOrderNumber();

                $aCategory['orderNumber'] = (int)$sOrderNumber['orderNumber'] + 1;

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

        public function categoryUpdate()
        {
                $sId = $_POST['sId'];
                $sOldCategory = $_POST['oldCategory'];
                $sNewCategory = $_POST['newCategory'];

                // category db 에서 categroy 값 바꾸기
                $bisSucc1 = $this->ModelCategory->updateCategory($sId, $sNewCategory);

                // contents db 에서 categroy 값 바꾸기
                $bisSucc2 = $this->ModelImageContent->updateCategoryName($sOldCategory, $sNewCategory);

                // file 명도 바꾸기
                rename('./uploads/'.$sOldCategory, './uploads/'.$sNewCategory);

                if($bisSucc1 && $bisSucc2) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./category');</script>";
        }

        public function categoryDelete()
        {       
                $sId = $_POST['sId'];
                $sCategory = $_POST['category'];

                // category db에서 지우고
                $bisSucc1 = $this->ModelCategory->deleteCategory($sId);

                // contents db에서 지우고
                $bisSucc2 = $this->ModelImageContent->deleteCategory($sCategory);

                // file에서도 지우기
                function rmdir_recursive($dir) {
                        foreach(scandir($dir) as $file) {
                                if ('.' === $file || '..' === $file) continue;
                                if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                                else unlink("$dir/$file");
                        }
                        rmdir($dir);
                }

                rmdir_recursive('./uploads/'.$sCategory);

                if($bisSucc1 && $bisSucc2) {
                        echo "<script>alert('삭제에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('삭제에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./category');</script>";
        }

        public function categoryorder()
        {
                foreach($_POST['categoryId'] as $key => $sCategoryId) {
                        $bisSucc = $this->ModelCategory->updateCategoryOrdering($key+1, $sCategoryId);
                }

                if($bisSucc) {
                        echo "<script>alert('순서 변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('순서 변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./category');</script>";
        }

        // 아카이브 눌렀을 때 이미지 보여주기
        public function archiveImage()
        {
                $sArchive = $_GET['name'];

                $ArchiveId = $this->ModelArchive->getArchiveId($sArchive);

                $aArchiveImage = $this->ModelArchiveContent->getArchiveContent($sArchive);

                $aAssign = array(
                        'sArchiveId' => $ArchiveId['id'],
                        'sArchive' => $sArchive,
                        'aArchiveImage' => $aArchiveImage
                );

                $this->load->view('viewArchiveImage', $aAssign);
        }

        public function archiveinsert()
        {
                $sArchive = $_GET['archive'];
                $aArchive = array('name' => $sArchive);

                $sOrderNumber = $this->ModelArchive->getMaxOrderNumber();

                $aArchive['orderNumber'] = (int)$sOrderNumber['orderNumber'] + 1;

                // db 값 추가
                $iInsertId = $this->ModelArchive->insertArchive($aArchive);

                // file 명도 추가
                $oldumask = umask(0);
                mkdir('./uploads/'.$sArchive, 0777, true);
                umask($oldumask);

                if($iInsertId > 0) {
                        echo "<script>alert('카테고리가 추가됐습니다');</script>";
                } else {
                        echo "<script>alert('카테고리를 추가에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./archive');</script>";
        }

        public function archiveUpdate()
        {
                $sId = $_POST['sId'];
                $sOldArchive = $_POST['oldArchive'];
                $sNewArchive = $_POST['newArchive'];

                // archive db 에서 Archive 값 바꾸기
                $bisSucc1 = $this->ModelArchive->updateArchive($sId, $sNewArchive);

                // contents db 에서 Archive 값 바꾸기
                $bisSucc2 = $this->ModelArchiveContent->updateArchiveName($sOldArchive, $sNewArchive);

                // file 명도 바꾸기
                rename('./uploads/'.$sOldArchive, './uploads/'.$sNewArchive);

                if($bisSucc1 && $bisSucc2) {
                        echo "<script>alert('변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./archive');</script>";
        }

        public function archiveDelete()
        {       
                $sId = $_POST['sId'];
                $sArchive = $_POST['archive'];

                // archive db에서 지우고
                $bisSucc1 = $this->ModelArchive->deleteArchive($sId);

                // contents db에서 지우고
                $bisSucc2 = $this->ModelArchiveContent->deleteArchive($sArchive);

                // file에서도 지우기
                function rmdir_recursive2($dir) {
                        foreach(scandir($dir) as $file) {
                                if ('.' === $file || '..' === $file) continue;
                                if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                                else unlink("$dir/$file");
                        }
                        rmdir($dir);
                }

                rmdir_recursive2('./uploads/'.$sArchive);

                if($bisSucc1 && $bisSucc2) {
                        echo "<script>alert('삭제에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('삭제에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./archive');</script>";
        }

        public function archiveorder()
        {
                foreach($_POST['contentId'] as $key => $sContentId) {
                        $bisSucc = $this->ModelArchiveContent->updateContentOrdering($key+1, $sContentId);
                }

                if($bisSucc) {
                        echo "<script>alert('순서 변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('순서 변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./archive');</script>";
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

        public function insertImage()
        {
                $sCategory = $_POST['category'];

                $config['upload_path']          = './uploads/'.$sCategory;
                $config['allowed_types']        = 'gif|jpg|png';
                $confg['file_ext_tolower']      = true;
                $config['max_size']             = 0; // 2 MB (2048 KB) 가 최대
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                $files = $_FILES;
                $iImageCount = count($_FILES['userfile']['name']);

                for ($i=0; $i < $iImageCount; $i++) {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                        if (! $this->upload->do_upload()) {
                                $error = array('error' => $this->upload->display_errors());
        
                                echo "<script>alert('이미지가 선택되지 않았거나 올바르지 않은 형식입니다.');</>";
                                echo "<script>location.replace('../categoryImage?name=$sCategory');</script>";
                        } else {
                                // 업로드 하고
                                $aUploadData = $this->upload->data();
        
                                $aUploadData['category'] = $sCategory;
        
                                $aMaxOrderNumber = $this->ModelImageContent->getMaxImageOrderNumber($sCategory);
        
                                $aUploadData['orderNumber'] = (int)$aMaxOrderNumber['orderNumber'] + 1;
        
                                // db에 해당 정보 넣고
                                $bisSucc = $this->ModelImageContent->insertUpload($aUploadData);
        
                                if ($bisSucc > 0) {
                                        // category 에 count 숫자 올리기
                                        $bisSucc = $this->ModelCategory->updateCategoryCount($sCategory);
                                }
                        }
                }

                if($bisSucc > 0) {
                        echo "<script>alert('업로드 성공했습니다');</script>";
                } else {
                        echo "<script>alert('변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('../categoryImage?name=$sCategory');</script>";

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

        public function contentorder()
        {
                $sCategoryName = $_POST['category'];

                foreach($_POST['contentId'] as $key => $contentId) {
                        $bisSucc = $this->ModelImageContent->updateContentOrdering($key+1, $contentId);
                }

                if($bisSucc) {
                        echo "<script>alert('순서 변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('순서 변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./categoryImage?name=$sCategoryName');</script>";
        }

        public function insertArchive()
        {
                $sArchive = $_POST['archive'];

                $config['upload_path']          = './uploads/'.$sArchive;
                $config['allowed_types']        = 'gif|jpg|png';
                $confg['file_ext_tolower']      = true;
                $config['max_size']             = 0; // 2 MB (2048 KB) 가 최대
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);

                if (! $this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());

                        echo "<script>alert('이미지가 선택되지 않았거나 올바르지 않은 형식입니다.');</script>";
                        echo "<script>location.replace('../archiveImage?name=$sArchive');</script>";
                } else {
                        // 업로드 하고
                        $aUploadData = $this->upload->data();

                        $aUploadData['archive'] = $sArchive;

                        $aMaxOrderNumber = $this->ModelArchiveContent->getMaxImageOrderNumber($sArchive);

                        $aUploadData['orderNumber'] = (int)$aMaxOrderNumber['orderNumber'] + 1;

                        // db에 해당 정보 넣고
                        $bisSucc = $this->ModelArchiveContent->insertUpload($aUploadData);

                        if ($bisSucc > 0) {
                                // category 에 count 숫자 올리기
                                $bisSucc = $this->ModelArchive->updateArchiveCount($sArchive);
                        }

                        if($bisSucc > 0) {
                                echo "<script>alert('업로드 성공했습니다');</script>";
                        } else {
                                echo "<script>alert('변경에 실패했습니다');</script>";
                        }
                        echo "<script>location.replace('../archiveImage?name=$sArchive');</script>";
                }
        }

        public function deleteArchiveImage()
        {
                $sContentIdx = $_POST['contentIdx'];
                $sArchive = $_POST['archive'];
                $sfileName = $_POST['fileName'];

                // db에서 지우고
                $bisSucc = $this->ModelArchiveContent->deleteContent($sContentIdx);

                // file에서도 지우기
                unlink('./uploads/'.$sArchive.'/'.$sfileName);

                if($bisSucc) {
                        echo "<script>alert('삭제에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('삭제에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./archiveImage?name=$sArchive');</script>";
        }

        public function contentorder2()
        {
                $sCategoryName = $_POST['category'];

                foreach($_POST['contentId'] as $key => $contentId) {
                        $bisSucc = $this->ModelImageContent->updateContentOrdering($key+1, $contentId);
                }

                if($bisSucc) {
                        echo "<script>alert('순서 변경에 성공했습니다');</script>";
                } else {
                        echo "<script>alert('순서 변경에 실패했습니다');</script>";
                }
                echo "<script>location.replace('./categoryImage?name=$sCategoryName');</script>";
        }
}
?>