<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327160526 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO tipo_general(
	id_tipo_general, tipo_general)
	VALUES (1, 'Tareas Programadas');");
        
        $this->addSql("INSERT INTO tipo_general(
	id_tipo_general, tipo_general)
	VALUES (2, 'Tareas Fuera del Cronograma');");
        
        $this->addSql("INSERT INTO tipo_general(
	id_tipo_general, tipo_general)
	VALUES (3, 'Tareas Internas del Sistema');");
        
        $this->addSql("INSERT INTO tipo_general(
	id_tipo_general, tipo_general)
	VALUES (4, 'Reuniones');");
        
        $this->addSql("INSERT INTO tipo_general(
	id_tipo_general, tipo_general)
	VALUES (5, 'Soporte');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (1, 2, 'AN', 'Anulaciones');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (2, 3, 'AP', 'Administración de Proyecto');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (3, 1, 'AR', 'Análisis de Requerimiento');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (4, null, 'TS', 'Control de Procesos');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (5, 1, 'DA', 'Desarrollo de Análisis');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (6, 1, 'DM', 'Documentación de Manual');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (7, 2, 'DN', 'Desarrollo NO Planeado');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (8, 1, 'DP', 'Desarrollo Porgramación');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (9, 1, 'EF', 'Especificación Funcional');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (10, 1, 'IM', 'Implementación');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (11, 2, 'IS', 'Información Solicitada');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (12, 3, 'MA', 'Mantenimiento');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (13, 4, 'RE', 'Reunión');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (14, 5, 'SO', 'Soporte Gestión');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (15, 5, 'SP', 'Soporte Programación');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (16, 3, 'CI', 'Control Interno');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (17, 1, 'TS', 'Testing/Validación Procesos');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (18, null, 'OT', 'Otras Áreas');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (19, null, 'PE', 'Personal');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (20, 1, 'IN', 'Investigación');");
        
        $this->addSql("INSERT INTO tipo_requerimiento(
	id_tipo_requerimiento, id_tipo_general, codigo, detalle)
	VALUES (21, null, 'CP', 'Capacitación');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (1, 'OPERACIONES');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (2, 'ADMINISTRACIÓN');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (3, 'CALIDAD');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (4, 'CALL CENTER');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (5, 'DIRECCIÓN');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (6, 'LOGÍSTICA');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (7, 'RRHH');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (8, 'SAC');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (9, 'SAC LOGÍSTICA');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (10, 'SEGURIDAD');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (11, 'SISTEMAS');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (12, 'COMERCIAL');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (13, 'SERVICIOS');");
        
        $this->addSql("INSERT INTO area(
	id_area, area)
	VALUES (14, 'INTERNACIONAL');");
        
        
        
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
