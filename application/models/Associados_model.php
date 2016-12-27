<?php

class Associados_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'associado';
    }

    public function efetuarLogin($login,$senha) {
        
        $this->db->select('*');
        $this->db->from('associado');
        $this->db->where('senha', $senha);
        $this->db->where('(email', $login);
        $this->db->or_where("login  = '$login' )", NULL);

        $query = $this->db->get();

        //  echo $this->db->last_query(); die();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

}

/* End of file */