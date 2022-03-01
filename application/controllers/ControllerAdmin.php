<?php

class ControllerAdmin extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
        }

        public function index()
        {
                $this->load->view('upload/viewUploadForm', array('error' => ' ' ));
        }

        public function upload()
        {
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
                        $aUploadData = $this->upload->data();

                        $this->load->model('modelImageContent');

                        $aUploadData['folder_name'] = 'temp';

                        $this->modelImageContent->insertUpload($aUploadData);

                        $aImageContents = $this->modelImageContent->getImageContents();

                        $aData = array('aImageContents' => $aImageContents);

                        $this->load->view('upload/viewUploadSuccess', $aData);
                }
        }
}
?>
