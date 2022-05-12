<?php

class ControllerLogin extends CI_Controller {
        public function __construct()
        {
                parent::__construct();

                $this->load->model('ModelLogin');
        }

        public function index()
        {
                if ($this->session->flashdata('message')) {
                        echo "<script>alert('".$this->session->flashdata('message')."');</script>";
                }
                $this->load->view('viewLogin');
        }

        public function exec()
        {
                $sId = $_POST['id'];
                $sPassword = $_POST['password'];                

                $hPassword = password_hash($sPassword, PASSWORD_BCRYPT);
                
                $aUserData = $this->ModelLogin->getUserData($sId);

                if ($sId === $aUserData['user_id'] && password_verify($sPassword, $aUserData['password'])) {
                        $this->session->set_userdata('is_login', true);
                        redirect('/admin');
                } else {
                        $this->session->set_flashdata('message', '로그인에 실패 했습니다.');
                        redirect('./login');
                }
        }

        public function passwordchange()
        {
                $sPassword = $_POST['password'];                

                $hPassword = password_hash($sPassword, PASSWORD_BCRYPT);

                $bIsSucc = $this->ModelLogin->updatePassword($hPassword);

                if ($bIsSucc) {
                        session_destroy();
                        echo "<script>alert('비밀번호 변경에 성공했습니다');</script>";
                        echo "<script>location.replace('../admin');</script>";
                } else {
                        echo "<script>alert('비밀번호 변경에 실패했습니다');</script>";
                        echo "<script>location.replace('./');</script>";
                }
                
        }
}