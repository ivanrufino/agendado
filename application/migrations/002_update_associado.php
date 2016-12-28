<?php
/**
 * Description of 002_update_associado
 *
 * @author imartins
 */
class Migration_update_associado extends CI_Migration {

    public function up() {
        $campo = array(
            'foto' => array('type' => 'varchar', 'constraint' => '100','null'=>FALSE, 'default' => 'user_foto.png','after' => 'senha')
        );
        $this->dbforge->add_column('associado', $campo);
    }

    public function down() {
        $this->dbforge->drop_column('associado', 'foto');
    }

}
