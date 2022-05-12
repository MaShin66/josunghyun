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

        // public function updateInstagramUrl($sEditUrl)
        // {
        //         if($this->db
        //         ->set('url', $sEditUrl)
        //         ->where('element', 'instagram')
        //         ->update('innerText')) {
        //                 return true;
        //         } else {
        //                 return false;
        //         }
        // }
}
?>