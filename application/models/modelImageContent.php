<?php
class ModelImageContent extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getAllImageContents()
        {
                return $this->db
                ->get('contents')
                ->result_array();
        }

        public function getImageContents($sCategory)
        {
                return $this->db
                ->select('*')
                ->where('category', $sCategory)
                ->get('contents')
                ->result_array();
        }
        
        public function insertUpload($aUploadData)
        {
                $aInsert = array(
                        'file_name' => $aUploadData['file_name'],
                        'category' => $aUploadData['category'],
                        'image_width' => $aUploadData['image_width'],
                        'image_height' => $aUploadData['image_height'],
                        'file_size' => $aUploadData['file_size']
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
}
?>