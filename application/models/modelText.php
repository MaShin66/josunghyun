<?php
class ModelText extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getInstagramUrl()
        {
                return $this->db
                ->select('*')
                ->where('element', 'instagram')
                ->get('innerText')
                ->row_array();
        }

        public function getMobileText()
        {
                return $this->db
                ->select('*')
                ->where('element', 'firstLine')
                ->or_where('element', 'secondLine')
                ->get('innerText')
                ->result_array();
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

        public function updateMobileText($sFirstLine, $sSecondLine)
        {
                $bIsSucc1 = false;
                $bIsSucc2 = false;

                if($this->db
                ->set('url', $sFirstLine)
                ->where('element', 'firstLine')
                ->update('innerText')) {
                        $bIsSucc1 = true;
                }

                if($this->db
                ->set('url', $sSecondLine)
                ->where('element', 'secondLine')
                ->update('innerText')) {
                        $bIsSucc2 = true;
                }

                if ($bIsSucc1 && $bIsSucc2) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>