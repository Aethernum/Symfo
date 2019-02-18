<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190218154913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE evenement_client (evenement_id INTEGER NOT NULL, client_id INTEGER NOT NULL, PRIMARY KEY(evenement_id, client_id))');
        $this->addSql('CREATE INDEX IDX_74B1D4D7FD02F13 ON evenement_client (evenement_id)');
        $this->addSql('CREATE INDEX IDX_74B1D4D719EB6921 ON evenement_client (client_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__evenement AS SELECT id, nom_evenement, date, heure_debut, heure_fin, nombre_place, categorie_place FROM evenement');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('CREATE TABLE evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_evenements_id INTEGER NOT NULL, nom_evenement VARCHAR(100) NOT NULL COLLATE BINARY, date DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, nombre_place INTEGER NOT NULL, categorie_place VARCHAR(20) NOT NULL COLLATE BINARY, CONSTRAINT FK_B26681E132D9BE1 FOREIGN KEY (type_evenements_id) REFERENCES type_evenement (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO evenement (id, nom_evenement, date, heure_debut, heure_fin, nombre_place, categorie_place) SELECT id, nom_evenement, date, heure_debut, heure_fin, nombre_place, categorie_place FROM __temp__evenement');
        $this->addSql('DROP TABLE __temp__evenement');
        $this->addSql('CREATE INDEX IDX_B26681E132D9BE1 ON evenement (type_evenements_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__billet AS SELECT id, code_billet, type_billet, libelle_billet, numero_place FROM billet');
        $this->addSql('DROP TABLE billet');
        $this->addSql('CREATE TABLE billet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, tarif_id INTEGER NOT NULL, evenement_id INTEGER NOT NULL, code_billet VARCHAR(16) NOT NULL COLLATE BINARY, type_billet VARCHAR(20) NOT NULL COLLATE BINARY, libelle_billet VARCHAR(20) NOT NULL COLLATE BINARY, numero_place INTEGER NOT NULL, CONSTRAINT FK_1F034AF619EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1F034AF6357C0A59 FOREIGN KEY (tarif_id) REFERENCES tarif (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1F034AF6FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO billet (id, code_billet, type_billet, libelle_billet, numero_place) SELECT id, code_billet, type_billet, libelle_billet, numero_place FROM __temp__billet');
        $this->addSql('DROP TABLE __temp__billet');
        $this->addSql('CREATE INDEX IDX_1F034AF619EB6921 ON billet (client_id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6357C0A59 ON billet (tarif_id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6FD02F13 ON billet (evenement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE evenement_client');
        $this->addSql('DROP INDEX IDX_1F034AF619EB6921');
        $this->addSql('DROP INDEX IDX_1F034AF6357C0A59');
        $this->addSql('DROP INDEX IDX_1F034AF6FD02F13');
        $this->addSql('CREATE TEMPORARY TABLE __temp__billet AS SELECT id, code_billet, type_billet, libelle_billet, numero_place FROM billet');
        $this->addSql('DROP TABLE billet');
        $this->addSql('CREATE TABLE billet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, code_billet VARCHAR(16) NOT NULL, type_billet VARCHAR(20) NOT NULL, libelle_billet VARCHAR(20) NOT NULL, numero_place INTEGER NOT NULL)');
        $this->addSql('INSERT INTO billet (id, code_billet, type_billet, libelle_billet, numero_place) SELECT id, code_billet, type_billet, libelle_billet, numero_place FROM __temp__billet');
        $this->addSql('DROP TABLE __temp__billet');
        $this->addSql('DROP INDEX IDX_B26681E132D9BE1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__evenement AS SELECT id, nom_evenement, date, heure_debut, heure_fin, nombre_place, categorie_place FROM evenement');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('CREATE TABLE evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_evenement VARCHAR(100) NOT NULL, date DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, nombre_place INTEGER NOT NULL, categorie_place VARCHAR(20) NOT NULL)');
        $this->addSql('INSERT INTO evenement (id, nom_evenement, date, heure_debut, heure_fin, nombre_place, categorie_place) SELECT id, nom_evenement, date, heure_debut, heure_fin, nombre_place, categorie_place FROM __temp__evenement');
        $this->addSql('DROP TABLE __temp__evenement');
    }
}
