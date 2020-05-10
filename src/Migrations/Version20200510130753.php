<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200510130753 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, trajet_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, date_a DATE NOT NULL, INDEX IDX_8F91ABF0D12A823 (trajet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, trajet_id INT DEFAULT NULL, users_id INT DEFAULT NULL, date_book DATE NOT NULL, place INT NOT NULL, INDEX IDX_E00CEDDED12A823 (trajet_id), INDEX IDX_E00CEDDE67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Trajet (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, users_id INT DEFAULT NULL, villedep VARCHAR(255) NOT NULL, datedep DATE NOT NULL, heuredep TIME NOT NULL, ville_a VARCHAR(255) NOT NULL, heure_a TIME NOT NULL, nbre_place INT NOT NULL, price DOUBLE PRECISION NOT NULL, distance INT NOT NULL, date_ajout DATE NOT NULL, INDEX IDX_2CF7ACBAA76ED395 (user_id), INDEX IDX_2CF7ACBA67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp INT NOT NULL, date_ins DATE NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0D12A823 FOREIGN KEY (trajet_id) REFERENCES Trajet (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDED12A823 FOREIGN KEY (trajet_id) REFERENCES Trajet (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE Trajet ADD CONSTRAINT FK_2CF7ACBAA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE Trajet ADD CONSTRAINT FK_2CF7ACBA67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0D12A823');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDED12A823');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE67B3B43D');
        $this->addSql('ALTER TABLE Trajet DROP FOREIGN KEY FK_2CF7ACBAA76ED395');
        $this->addSql('ALTER TABLE Trajet DROP FOREIGN KEY FK_2CF7ACBA67B3B43D');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE Trajet');
        $this->addSql('DROP TABLE users');
    }
}
