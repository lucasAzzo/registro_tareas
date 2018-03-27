<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327154446 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE area (id_area SERIAL NOT NULL, area VARCHAR(100) NOT NULL, PRIMARY KEY(id_area))');
        $this->addSql('CREATE TABLE requerimiento (id_requerimiento SERIAL NOT NULL, id_area INT DEFAULT NULL, codigo VARCHAR(100) NOT NULL, PRIMARY KEY(id_requerimiento))');
        $this->addSql('CREATE INDEX IDX_54E924125CB4216A ON requerimiento (id_area)');
        $this->addSql('CREATE TABLE tarea (id_tarea SERIAL NOT NULL, id_tipo_requerimiento INT DEFAULT NULL, id_requerimiento INT DEFAULT NULL, id_area INT DEFAULT NULL, tarea VARCHAR(255) NOT NULL, hora_inicio TIME(0) WITHOUT TIME ZONE NOT NULL, hora_fin TIME(0) WITHOUT TIME ZONE DEFAULT NULL, hora_invertida TIME(0) WITHOUT TIME ZONE DEFAULT NULL, fecha DATE NOT NULL, PRIMARY KEY(id_tarea))');
        $this->addSql('CREATE INDEX IDX_3CA05366D778C5E3 ON tarea (id_tipo_requerimiento)');
        $this->addSql('CREATE INDEX IDX_3CA05366EAC1F577 ON tarea (id_requerimiento)');
        $this->addSql('CREATE INDEX IDX_3CA053665CB4216A ON tarea (id_area)');
        $this->addSql('CREATE TABLE tipo_general (id_tipo_general SERIAL NOT NULL, tipo_general VARCHAR(100) NOT NULL, PRIMARY KEY(id_tipo_general))');
        $this->addSql('CREATE TABLE tipo_requerimiento (id_tipo_requerimiento SERIAL NOT NULL, id_tipo_general INT DEFAULT NULL, codigo VARCHAR(10) NOT NULL, detalle VARCHAR(255) NOT NULL, PRIMARY KEY(id_tipo_requerimiento))');
        $this->addSql('CREATE INDEX IDX_545A774CFE116298 ON tipo_requerimiento (id_tipo_general)');
        $this->addSql('ALTER TABLE requerimiento ADD CONSTRAINT FK_54E924125CB4216A FOREIGN KEY (id_area) REFERENCES area (id_area) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tarea ADD CONSTRAINT FK_3CA05366D778C5E3 FOREIGN KEY (id_tipo_requerimiento) REFERENCES tipo_requerimiento (id_tipo_requerimiento) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tarea ADD CONSTRAINT FK_3CA05366EAC1F577 FOREIGN KEY (id_requerimiento) REFERENCES requerimiento (id_requerimiento) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tarea ADD CONSTRAINT FK_3CA053665CB4216A FOREIGN KEY (id_area) REFERENCES area (id_area) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tipo_requerimiento ADD CONSTRAINT FK_545A774CFE116298 FOREIGN KEY (id_tipo_general) REFERENCES tipo_general (id_tipo_general) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE requerimiento DROP CONSTRAINT FK_54E924125CB4216A');
        $this->addSql('ALTER TABLE tarea DROP CONSTRAINT FK_3CA053665CB4216A');
        $this->addSql('ALTER TABLE tarea DROP CONSTRAINT FK_3CA05366EAC1F577');
        $this->addSql('ALTER TABLE tipo_requerimiento DROP CONSTRAINT FK_545A774CFE116298');
        $this->addSql('ALTER TABLE tarea DROP CONSTRAINT FK_3CA05366D778C5E3');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE requerimiento');
        $this->addSql('DROP TABLE tarea');
        $this->addSql('DROP TABLE tipo_general');
        $this->addSql('DROP TABLE tipo_requerimiento');
    }
}
