<?php
class ModelLogin extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getUserData($sId)
        {
                return $this->db
                ->select('*')
                ->from('admin')
                ->where('user_id', $sId)
                ->get()->row_array();
        }

        public function updatePassword($hPassword)
        {
                if($this->db
                ->set('password', $hPassword)
                ->where('user_id', 'admin')
                ->update('admin')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>