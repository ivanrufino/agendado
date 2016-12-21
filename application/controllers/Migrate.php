<?php

class Migrate extends CI_Controller {

    public function index() {
        $this->load->library('migration');
      //  print_r($this->migration->latest());
     //   $this->migration->version(0);
//        if ($this->migration->current() === FALSE) {
//            show_error($this->migration->error_string());
//        }
        echo $this->migration->current();
    }
    public function setVersao($versao) {
        $this->load->library('migration');
        $this->migration->version($versao);
       
       // echo "migrado para a versao ". $this->migration->current();
         show_error($this->migration->error_string());
    }

}
