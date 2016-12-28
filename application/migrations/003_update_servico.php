<?php
/**
 * Description of 002_update_associado
 *
 * @author imartins
 */
class Migration_update_servico extends CI_Migration {

    public function up() {
        $campo = array(
            'id_servico' => array('type' => 'int','null'=>TRUE),
            'id_empresa' => array('type' => 'int','null'=>TRUE)
        );
        $this->dbforge->add_column('servicos', $campo);
    }

    public function down() {
        $this->dbforge->drop_column('servicos', 'id_servico');
        $this->dbforge->drop_column('servicos', 'id_empresa');
    }

}
