<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 001_migracao_inicial
 *
 * @author imartins
 */
class Migration_Migracao_inicial extends CI_Migration {

    public function up() {

        foreach ($this->queries() as $query) {
            $this->db->query($query);
        }
    }

    public function down() {
        $this->dbforge->drop_table('agenda');
    }

    public function queries() {




        $queries[] = "CREATE TABLE IF NOT EXISTS `empresa` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome ou razão social',
                `tipo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'F= pessoa fisica, J=pessoa Juridica',
                `cnpj` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
                `cpf` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
                `area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                `segmento` int(11) DEFAULT NULL,
                `url` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
                 `hora_inicio` time NOT NULL,
                 `hora_fim` time NOT NULL,
                `logo` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'logoPadrao.png',
                `TELEFONE` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
                PRIMARY KEY (`id`),
                KEY `SEGMENTO` (`segmento`)
               )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `associado` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                    `senha` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
                    `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `ultima_atividade` datetime DEFAULT NULL,
                    `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I' COMMENT 'I - inativo, A -ativo',
                    `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                    `nome_responsavel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                    `sobrenome_responsavel` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
                    `id_empresa` int(11) DEFAULT NULL,
                    PRIMARY KEY (`id`),
                    KEY `id_empresa` (`id_empresa`),
                    CONSTRAINT `associado_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE
                   )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `associado_empresa` (
                `id_associado` int(11) NOT NULL,
                `id_empresa` int(11) NOT NULL,
                UNIQUE KEY `id_associado_empresa` (`id_associado`,`id_empresa`),
                KEY `id_empresa` (`id_empresa`),
                CONSTRAINT `associado_empresa_ibfk_1` FOREIGN KEY (`id_associado`) REFERENCES `associado` (`id`) ON DELETE CASCADE,
                CONSTRAINT `associado_empresa_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE
               )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `compra` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `id_associado` int(11) NOT NULL,
                    `id_produto` int(11) NOT NULL COMMENT 'planos e outros serviços que eu possa adcionar',
                    `code` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'code de retorno do pagseguro',
                    `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'status do retorno do pagseguro',
                    `data` datetime NOT NULL,
                    `ultima_alteracao` datetime NOT NULL,
                    PRIMARY KEY (`id`)
                   )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `plano` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
                    `valor_mensal` decimal(10,2) NOT NULL,
                    `valor_anual` decimal(10,2) NOT NULL,
                    `descricao` text COLLATE utf8_unicode_ci NOT NULL,
                    PRIMARY KEY (`id`)
                   )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `detalhes_plano` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_plano` int(11) NOT NULL,
                `num_agendas` int(11) DEFAULT '50',
                `num_servicos` int(11) DEFAULT '2',
                `lembrete_email` tinyint(1) DEFAULT '0',
                `num_templates` int(11) DEFAULT NULL,
                `personaliza_template` tinyint(1) DEFAULT '0',
                `num_foto_local` int(11) DEFAULT '2',
                `prazo_agendamento` int(11) DEFAULT '2',
                `num_funcionario_local` int(11) DEFAULT '2',
                PRIMARY KEY (`id`),
                KEY `id_plano` (`id_plano`),
                CONSTRAINT `detalhes_plano_ibfk_1` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id`) ON DELETE CASCADE
               )  AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `endereco` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `id_empresa` int(11) NOT NULL,
                    `cep` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
                    `endereco` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
                    `bairro` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
                    `cidade` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
                    `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
                    `latitude` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `longitude` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE KEY `id_empresa` (`id_empresa`),
                    CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE
                   )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `feriado_nacional` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `data` datetime NOT NULL,
                `feriado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                PRIMARY KEY (`id`)
               )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
               ";
        $queries[] = "CREATE TABLE IF NOT EXISTS `funcionario` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                `id_empresa` int(11) NOT NULL,
                `descricao` text COLLATE utf8_unicode_ci NOT NULL,
                `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                `status` tinyint(1) NOT NULL DEFAULT '1',
                PRIMARY KEY (`id`)
               )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='(funcionario ou num_sala)o agendamento pertence a esta tabela '";

        $queries[] = "CREATE TABLE IF NOT EXISTS `servicos` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                    `background` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `textcolor` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `bordercolor` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
                    PRIMARY KEY (`id`)
                   )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

        $queries[] = "CREATE TABLE IF NOT EXISTS `func_serv` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `id_funcionario` int(11) NOT NULL,
                    `id_servico` int(11) NOT NULL,
                    `valor` decimal(10,2) NOT NULL,
                    `obs` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
                    `duracao` int(11) NOT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE KEY `COD_FUNCIONARIO` (`id_funcionario`,`id_servico`),
                    KEY `FUNC_SERV_ibfk_2` (`id_servico`),
                    CONSTRAINT `func_serv_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE,
                    CONSTRAINT `func_serv_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id`) ON DELETE CASCADE
                   )  AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";

        $queries[] = "	
                CREATE TABLE IF NOT EXISTS `horario` (
                 `id_funcSala` int(11) NOT NULL,
                 `hora_inicio` time NOT NULL,
                 `hora_fim` time NOT NULL,
                 `dia_todo` tinyint(1) NOT NULL DEFAULT '1',
                 `dias_trabalho` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
                 `funcionamento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
                 UNIQUE KEY `id_funcSala` (`id_funcSala`),
                 CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_funcSala`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE
                )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT=''";

        $queries[] = "CREATE TABLE IF NOT EXISTS `usuario` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
                `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `ultima_atividade` datetime DEFAULT NULL,
                `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
                `data_nascimento` date NOT NULL,
                `profissao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
                PRIMARY KEY (`id`)
               )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `mensagem` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `id_cliente` int(11) DEFAULT NULL,
            `nome_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            `email_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            `id_associado` int(11) NOT NULL,
            `mensagem` text COLLATE utf8_unicode_ci NOT NULL,
            `grau` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Baixa Importancia, 2- Media Importancia, 3- Alta Importancia',
            `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `id_cliente` (`id_cliente`),
            KEY `id_associado` (`id_associado`),
            CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`id`) ON DELETE SET NULL,
            CONSTRAINT `mensagem_ibfk_2` FOREIGN KEY (`id_associado`) REFERENCES `associado` (`id`) ON DELETE CASCADE) 
             DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela de mensagem de cliente para empresas/associados'";

        $queries[] = "CREATE TABLE IF NOT EXISTS `plano_associado` (
                    `id_associado` int(11) NOT NULL,
                    `id_plano` int(11) NOT NULL
                   )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `segmento` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                `descricao` text COLLATE utf8_unicode_ci NOT NULL,
                `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                `tipo` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1-Serviços, 2 Locação',
                PRIMARY KEY (`id`)
               )   DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";



        $queries[] = "CREATE TABLE IF NOT EXISTS `agenda` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                `id_funcionario` int(11) NOT NULL,
                `id_servico` int(11) NOT NULL,
                `dia` int(2) NOT NULL,
                `hora_inicio` time NOT NULL,
                `hora_fim` time NOT NULL,
                `duracao` int(4) NOT NULL COMMENT 'Duração de cada agendamento',
                `intervalo` int(4) NOT NULL COMMENT 'intervalo entre cada agendamento',
                PRIMARY KEY (`id`),
                KEY `id_funcionario` (`id_funcionario`),
                CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE
               )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $queries[] = "CREATE TABLE IF NOT EXISTS `agendamento` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `id_cliente` int(11) NOT NULL,
                    `start_event` datetime NOT NULL,
                    `end_event` datetime NOT NULL,
                    `allday` tinyint(1) NOT NULL DEFAULT '0',
                    `id_funcionario` int(11) NOT NULL,
                    `id_servico` int(11) NOT NULL,
                    `confirmado` tinyint(1) NOT NULL,
                    `backgroundColor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `textColor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `borderColor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `extra` text COLLATE utf8_unicode_ci,
                    `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `editavel` tinyint(1) NOT NULL DEFAULT '1',
                    PRIMARY KEY (`id`),
                    KEY `id_cliente` (`id_cliente`,`id_funcionario`),
                    KEY `id_func_sala` (`id_funcionario`),
                    KEY `id_servico` (`id_servico`),
                    CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
                    CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
                   )  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        return $queries;
    }

}
