<?php
class ModelCategory extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getAllCategory()
        {
                return $this->db->order_by('orderNumber', 'ASC')->get('category')->result_array();
        }

        public function getCategoryId($sCategory)
        {
                return $this->db
                        ->where('name', $sCategory)
                        ->get('category')
                        ->row_array();
        }

        public function getMaxOrderNumber()
        {
                return $this->db
                        ->select_max('orderNumber')
                        ->get('category')
                        ->row_array();
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

        public function updateCategoryCount($sCategory)
        {
                $sPrevCount = $this->db
                ->select('count')
                ->where('name', $sCategory)
                ->get('category')
                ->row_array();

                if($this->db
                ->set('count', (int) $sPrevCount['count']+1)
                ->where('name', $sCategory)
                ->update('category')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function updateCategoryOrdering($orderNumber, $sCategoryId)
        {
                if ($this->db
                ->set('orderNumber', $orderNumber)
                ->where('id', $sCategoryId)
                ->update('category')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function deleteCategory($sId)
        {
                if ($this->db
                ->where('id', $sId)
                ->delete('category')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>