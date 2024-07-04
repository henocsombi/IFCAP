<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704092428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Adherent (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, email VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, telephone INT NOT NULL, INDEX IDX_69A5923671C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Adherent ADD CONSTRAINT FK_69A5923671C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D671C15D5C');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE date');
        $this->addSql('ALTER TABLE contact CHANGE facebook facebook VARCHAR(255) DEFAULT NULL, CHANGE linkedin linkedin VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD date_debut DATE NOT NULL, ADD date_fin DATE NOT NULL, DROP id_date_id, DROP inscriptions, CHANGE nbr_adherents nbr_adherents INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, statut VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone INT NOT NULL, INDEX IDX_5E90F6D671C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, duree VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D671C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Adherent DROP FOREIGN KEY FK_69A5923671C15D5C');
        $this->addSql('DROP TABLE Adherent');
        $this->addSql('ALTER TABLE contact CHANGE facebook facebook VARCHAR(255) NOT NULL, CHANGE linkedin linkedin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE session ADD id_date_id INT NOT NULL, ADD inscriptions INT NOT NULL, DROP date_debut, DROP date_fin, CHANGE nbr_adherents nbr_adherents INT DEFAULT NULL');
    }
}
