/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  imartins
 * Created: 12/12/2016
 */

CREATE OR REPLACE
 ALGORITHM = UNDEFINED
 VIEW `v_empresa_servico`
 AS select e.id, e.nome as empresa,e.logo, f.nome as funcionario,f.foto,fs.id as id_func_serv, fs.valor,fs.duracao, fs.obs, s.nome as nome_servico, s.id as id_servico
from empresa e
join funcionario f on f.id_empresa = e.id
join func_serv fs on fs.id_funcionario = f.id 
JOIN servicos s on s.id = fs.id_servico

CREATE OR REPLACE 
 VIEW `v_funcionario`
 AS select f.*,fs.id as id_func_serv,fs.valor,fs.duracao,fs.dias,fs.hora_inicio,fs.hora_fim, s.nome as servico,s.logo,s.id as id_servico from funcionario f 
join func_serv fs on fs.id_funcionario = f.id
join servicos s on s.id = fs.id_servico

CREATE OR REPLACE
 ALGORITHM = UNDEFINED
 VIEW `v_agendamento`
 AS SELECT a.id,DATE_FORMAT(a.`start_event`,'%Y-%m-%dT%T') as `start`,DATE_FORMAT(a.`end_event`,'%Y-%m-%dT%T') as `end`,a.backgroundColor,a.textColor,a.id_funcionario, concat(s.nome)as title FROM `agendamento` a
JOIN funcionario f on f.id = a.id_funcionario
join servicos s on s.id = a.id_servico

CREATE OR REPLACE
 ALGORITHM = UNDEFINED
 VIEW `v_cliente_agendamento`
 AS select a.*,s.id_empresa,u.nome,u.email from agendamento a 
join servicos s on a.id_servico = s.id 
join usuario u on u.id = a.id_cliente

CREATE
 ALGORITHM = UNDEFINED
 VIEW `v_plano_associado`
 AS SELECT p.nome,p.valor_mensal,p.valor_anual,p.descricao, dp.*,pa.id_associado FROM `plano` p 
join detalhes_plano dp on dp.id_plano = p.id
join plano_associado pa on pa.id_plano = p.id

ALTER TABLE  `agenda` CHANGE  `id_funcionario`  `id_func_serv` INT( 11 ) NOT NULL
ALTER TABLE  `agenda` CHANGE  `dia`  `dia` VARCHAR( 15 ) NOT NULL
ALTER TABLE  `agenda` DROP INDEX  `id_funcionario` ,ADD INDEX  `id_func_serv` (  `id_func_serv` )

ALTER TABLE  `func_serv` ADD  `dias` VARCHAR( 10 ) NOT NULL AFTER  `duracao` ,
ADD  `hora_inicio` TIME NOT NULL AFTER  `dias` ,
ADD  `hora_fim` TIME NOT NULL AFTER  `hora_inicio`