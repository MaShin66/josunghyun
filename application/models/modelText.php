<?php
class modelText extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getInstagramUrl()
        {
                return $this->db
                ->select('*')
                ->from('innerText')
                ->where('element', 'instagram')
                ->get()->row_array();
        }

        public function getIntroduceText()
        {

        }

        public function updateInstagramUrl($sEditUrl)
        {
                if($this->db
                ->set('url', $sEditUrl)
                ->where('element', 'instagram')
                ->update('innerText')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>