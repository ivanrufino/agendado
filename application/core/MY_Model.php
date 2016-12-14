<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// http://jeromejaglale.com/doc/php/codeigniter_models

class MY_Model extends CI_Model {

    var $table = "";

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function setTable($table) {
        $this->table = $table;
    }

    function insert($data) {
        
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        } else {
            return NULL;
        }
    }

    function getById($id) {
        if ($id == NULL) {
            return NULL;
        }

        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return NULL;
        }
    }

    function getAll($sort = 'id', $order = 'asc', $where = null) {
        $this->db->order_by($sort, $order);
        if (!is_null($where)) {
            $this->db->where($where['campo'], $where['busca']);
        }
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function getWhere($where_campo, $where_busca, $sort = 'id', $order = 'asc') {
        $this->db->order_by($sort, $order);
        $this->db->where($where_campo, $where_busca);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return NULL;
    }

    function delete($id) {
        if ($id != NULL) {
            $this->db->where('id', $id);
            $this->db->delete($this->table);
        }
    }
    public function getLastQuery() {
        return $this->db->last_query();
    }

}

/* End of file */
