<?php
class ModelArchiveContent extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getAllArchiveContent()
        {
                return $this->db
                        ->order_by('orderNumber', 'ASC')
                        ->get('archiveContents')
                        ->result_array();
        }

        public function getArchiveContent($sArchive)
        {
                return $this->db
                        ->order_by('orderNumber', 'ASC')
                        ->where('archive', $sArchive)
                        ->get('archiveContents')
                        ->result_array();
        }

        public function getMaxImageOrderNumber($sArchive)
        {
                return $this->db
                        ->select_max('orderNumber')
                        ->where('archive', $sArchive)
                        ->get('archiveContents')
                        ->row_array();
        }
        
        public function insertUpload($aUploadData)
        {
                $aInsert = array(
                        'file_name' => $aUploadData['file_name'],
                        'archive' => $aUploadData['archive'],
                        'image_width' => $aUploadData['image_width'],
                        'image_height' => $aUploadData['image_height'],
                        'file_size' => $aUploadData['file_size'],
                        'orderNumber' => $aUploadData['orderNumber']
                );

                $this->db->insert('archiveContents', $aInsert);

                return $this->db->insert_id();
        }

        public function deleteContent($sContentIdx)
        {
                if ($this->db
                ->where('content_idx', $sContentIdx)
                ->delete('archiveContents')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function updateArchiveName($sOldArchive, $sNewArchive)
        {
                if ($this->db
                ->set('archive', $sNewArchive)
                ->where('archive', $sOldArchive)
                ->update('archiveContents')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function deleteArchive($sArchive)
        {
                if ($this->db
                ->where('archive', $sArchive)
                ->delete('archiveContents')) {
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
                ->update('archiveContents')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>