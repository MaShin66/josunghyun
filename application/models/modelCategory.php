<?php
class modelCategory extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getAllCategory()
        {
                return $this->db->get('category')->result_array();
        }

        public function insertCategory($aCategory)
        {
                $this->db->insert('category', $aCategory);
                return $this->db->insert_id();
        }

        public function updateCategory($sId, $sNewCategory)
        {
                if($this->db
                ->set('name', $sNewCategory)
                ->where('id', $sId)
                ->update('category')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>