<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

    public function Getdata($table){
        return $this->db->get($table);
    }

    public function insert_data($table){
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table){
      $this->db->where('id_buku', $data['id_buku']);
      $this->db->update($table, $data);
  }

  public function delete($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
}


/* End of file Siswa_model.php */
  }
?>