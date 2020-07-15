<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200709144629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, job_category_id INT NOT NULL, description VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, notes VARCHAR(255) NOT NULL, job_title VARCHAR(255) NOT NULL, contract_type VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, closing_date DATE DEFAULT NULL, salary INT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_288A3A4EDC2902E0 (client_id_id), INDEX IDX_288A3A4E712A86AB (job_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_infos (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, job_category_id INT NOT NULL, society_name VARCHAR(255) NOT NULL, contact_name VARCHAR(255) NOT NULL, contact_position VARCHAR(255) NOT NULL, contact_phone VARCHAR(255) NOT NULL, contact_email VARCHAR(255) NOT NULL, notes VARCHAR(255) NOT NULL, INDEX IDX_C7440455712A86AB (job_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EDC2902E0');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE login_infos');
        $this->addSql('DROP TABLE client');
    }
}
