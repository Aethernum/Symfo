<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190218151203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_evenement INTEGER NOT NULL, nom_evenement VARCHAR(100) NOT NULL, date DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, nombre_place INTEGER NOT NULL, categorie_place VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_client INTEGER NOT NULL, nom_client VARCHAR(40) NOT NULL, prenom_client VARCHAR(40) NOT NULL, pseudo VARCHAR(20) NOT NULL, mdp_client VARCHAR(50) NOT NULL, mail_client VARCHAR(50) NOT NULL, type_client VARCHAR(30) NOT NULL)');
        $this->addSql('CREATE TABLE type_evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_type_evenement INTEGER NOT NULL, type_evenement VARCHAR(50) NOT NULL, libelle_evenement VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE billet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, code_billet VARCHAR(16) NOT NULL, type_billet VARCHAR(20) NOT NULL, libelle_billet VARCHAR(20) NOT NULL, numero_place INTEGER NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE billet');
    }
}
