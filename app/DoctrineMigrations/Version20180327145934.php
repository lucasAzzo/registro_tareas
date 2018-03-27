<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327145934 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO route(
	id_route, path, name, parametro)
	VALUES (1, '/tareas', 'tarea_index', null);");
        
        $this->addSql("INSERT INTO route(
	id_route, path, name, parametro)
	VALUES (2, '/requerimientos', 'requerimiento_index', null);");
        
        $this->addSql("INSERT INTO menu(
	id_menu, id_menu_padre, id_route, nombre, orden, icono)
	VALUES (1, null, null, 'REGISTRO', 10, 'dashboard');");
        
        $this->addSql("INSERT INTO menu(
	id_menu, id_menu_padre, id_route, nombre, orden, icono)
	VALUES (2, 1, 1, 'Tareas', 10, null);");
        
        $this->addSql("INSERT INTO menu(
	id_menu, id_menu_padre, id_route, nombre, orden, icono)
	VALUES (3, 1, 2, 'Requerimientos', 20, null);");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
