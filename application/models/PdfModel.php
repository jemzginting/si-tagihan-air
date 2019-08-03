    <?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class PdfModel extends CI_Model
    {


        public function getContent($data)
        {
            $this->db->select(array('*'));
            //  $this->db->select('b.*');
            $this->db->from('tb_himbauan h');
            $this->db->join('tb_pelanggan p', 'h.no_kontrol = p.no_kontrol');
            $this->db->where('h.id_himbauan', $data);
            $query = $this->db->get();
            return $query->row_array();
        }
    }
    ?>