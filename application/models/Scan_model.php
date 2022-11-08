<?php

  class Scan_model extends Ci_Model{

    function cek_id($id_alat){
        $query_str = "SELECT * FROM alat_kalibrasi WHERE id_alat= ? ";
        $result = $this->db->query($query_str, array($id_alat));
          if ($result->num_rows()==1){
              return $result->row(0)->id_alat;
            }
            else{
              return false;
            }
    }
  }
 ?>
