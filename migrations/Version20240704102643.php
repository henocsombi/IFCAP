<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704102643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Adherent (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, email VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, telephone INT NOT NULL, INDEX IDX_69A5923671C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_8F91ABF071C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, id_certif_id INT NOT NULL, nom VARCHAR(255) NOT NULL, resume VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duree VARCHAR(255) NOT NULL, prerequis VARCHAR(255) NOT NULL, debouches VARCHAR(255) NOT NULL, INDEX IDX_404021BF63F29423 (id_certif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, id_formation_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, nbr_adherents INT NOT NULL, INDEX IDX_D044D5D471C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Adherent ADD CONSTRAINT FK_69A5923671C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF071C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF63F29423 FOREIGN KEY (id_certif_id) REFERENCES certification (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D471C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Adherent DROP FOREIGN KEY FK_69A5923671C15D5C');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF071C15D5C');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF63F29423');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D471C15D5C');
        $this->addSql('DROP TABLE Adherent');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
