<?php
class ModelImageContent extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getAllImageContents()
        {
                return $this->db
                        ->order_by('orderNumber', 'ASC')
                        ->get('contents')
                        ->result_array();
        }

        public function getImageContents($sCategory)
        {
                return $this->db
                        ->order_by('orderNumber', 'ASC')
                        ->where('category', $sCategory)
                        ->get('contents')
                        ->result_array();
        }

        public function getMaxImageOrderNumber($sCategory)
        {
                return $this->db
                        ->select_max('orderNumber')
                        ->where('category', $sCategory)
                        ->get('contents')
                        ->row_array();
        }
        
        public function insertUpload($aUploadData)
        {
                $aInsert = array(
                        'file_name' => $aUploadData['file_name'],
                        'category' => $aUploadData['category'],
                        'image_width' => $aUploadData['image_width'],
                        'image_height' => $aUploadData['image_height'],
                        'file_size' => $aUploadData['file_size'],
                        'orderNumber' => $aUploadData['orderNumber']
                );

                $this->db->insert('contents', $aInsert);

                return $this->db->insert_id();
        }

        public function deleteImage($sContentIdx)
        {
                if ($this->db
                ->where('content_idx', $sContentIdx)
                ->delete('contents')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function updateCategoryName($sOldCategory, $sNewCategory)
        {
                if ($this->db
                ->set('category', $sNewCategory)
                ->where('category', $sOldCategory)
                ->update('contents')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function deleteCategory($sCategory)
        {
                if ($this->db
                ->where('category', $sCategory)
                ->delete('contents')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function updateContentOrdering($orderNumber, $contentId)
        {
                if ($this->db
                ->set('orderNumber', $orderNumber)
                ->where('content_idx', $contentId)
                ->update('contents')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>