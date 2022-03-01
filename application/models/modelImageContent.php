<?php
class modelImageContent extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getImageContents()
        {
                $query = $this->db->get('contents');
                return $query->result_array();
        }
        
        public function insertUpload($aUploadData)
        {
                $aInsert = array(
                        'file_name' => $aUploadData['file_name'],
                        'folder_name' => $aUploadData['folder_name'],
                        'image_width' => $aUploadData['image_width'],
                        'image_height' => $aUploadData['image_height'],
                        'file_size' => $aUploadData['file_size']
                );

                $this->db->insert('contents', $aInsert);
        }
}
?>