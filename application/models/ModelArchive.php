<?php
class ModelArchive extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getAllArchive()
        {
                return $this->db->order_by('orderNumber', 'ASC')->get('archive')->result_array();
        }

        public function getArchiveId($sArchive)
        {
                return $this->db
                        ->where('name', $sArchive)
                        ->get('archive')
                        ->row_array();
        }

        public function getMaxOrderNumber()
        {
                return $this->db
                        ->select_max('orderNumber')
                        ->get('archive')
                        ->row_array();
        }

        public function insertArchive($aArchive)
        {
                $this->db->insert('archive', $aArchive);
                return $this->db->insert_id();
        }

        public function updateArchive($sId, $sNewArchive)
        {
                if($this->db
                ->set('name', $sNewArchive)
                ->where('id', $sId)
                ->update('archive')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function updateArchiveCount($sArchive)
        {
                $sPrevCount = $this->db
                ->select('count')
                ->where('name', $sArchive)
                ->get('archive')
                ->row_array();

                if($this->db
                ->set('count', (int) $sPrevCount['count']+1)
                ->where('name', $sArchive)
                ->update('archive')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function updateArchiveOrdering($orderNumber, $sArchiveId)
        {
                if ($this->db
                ->set('orderNumber', $orderNumber)
                ->where('id', $sArchiveId)
                ->update('archive')) {
                        return true;
                } else {
                        return false;
                }
        }

        public function deleteArchive($sId)
        {
                if ($this->db
                ->where('id', $sId)
                ->delete('archive')) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>